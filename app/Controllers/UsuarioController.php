<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;

class UsuarioController extends Controller{
    protected $UsuarioModel;
    public function __construct()
    {
        helper(['form','url']);
        $this->UsuarioModel= new UsuarioModel();
    }
    public function create()
    {
        $dato['titulo']='Registro';
        echo view('front/header',$dato);
        echo view('front/navbar');
        echo view('usuario/registro', ['validation' => $this->validator]);
        echo view('front/footer');
    }
    
    public function formValidation(){
        $input =$this->validate([
            'UsuarioNombre' => 'required|min_length[3]',
            'UsuarioApellido' => 'required|min_length[3]|max_length[25]',
            'UsuarioMail' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.UsuarioMail]',
            'UsuarioPass' => 'required|min_length[3]|max_length[10]',
            'UsuarioFechaNac' => 'required'
        ], 
        [
            'UsuarioNombre' => [
                'required' => 'El nombre es obligatorio',
                'min_length' => 'El nombre debe tener al menos 3 caracteres'
            ],
            'UsuarioApellido' => [
                'required' => 'El apellido es obligatorio',
                'min_length' => 'El apellido debe tener al menos 3 caracteres',
                'max_length' => 'El apellido no puede tener más de 25 caracteres'
            ],
            'UsuarioMail' => [
                'required' => 'El mail es obligatorio',
                'min_length' => 'El mail debe tener al menos 4 caracteres',
                'max_length' => 'El mail no puede tener más de 100 caracteres',
                'valid_email' => 'El formato del mail es incorrecto',
                'is_unique' => 'El mail ya está registrado'
            ],
            'UsuarioPass' => [
                'required' =>'La Contraseña es obligatoria',
                'min_length'=>'La Contraseñaa debe tener al menos 3 caracteres',
                'max_length'=>'La Contraseña no puede tener más de 10 caracteres'
            ],
            'UsuarioFechaNac' => ['required'=>'La fecha de nacimiento es obligatoria']
        ]);
        

        $formModel = new UsuarioModel();
        
        if(!$input){
            $data['titulo'] = 'Registro';
            echo view('front/header', $data);
            echo view('front/navbar');
            echo view('usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer');
        } else {
            $formModel -> save([
                'UsuarioNombre' => $this->request->getVar('UsuarioNombre'),
                'UsuarioApellido' => $this->request->getVar('UsuarioApellido'),
                'UsuarioMail' => $this->request->getVar('UsuarioMail'),
                'UsuarioPass' => password_hash($this->request->getVar('UsuarioPass'), PASSWORD_DEFAULT),
                'UsuarioFechaNac' => $this->request->getVar('UsuarioFechaNac'),
            ]);

            session()->setFlashdata('success', 'Usuario registrado con exito');
            return redirect('registro');
        }
    }

    public function login()
    {
        $data['titulo'] = 'Login';
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('usuario/login');
        echo view('front/footer');
    }

    public function loginValidation()
    {
        //Crea el objeto validate que tiene las reglas a validar
        $input = $this->validate([
            'UsuarioMail' => 'required|valid_email',
            'UsuarioPass' => 'required'
        ], 
        [
        'UsuarioMail' => [
            'required'    => 'El mail es obligatorio',
            'valid_email' => 'La dirección de correo electrónico no es válida.'
        ],
        'UsuarioPass' => [
            'required' => 'La contraseña es obligatoria'
        ]
    ]);

        // Si la validacion falla, muestra el formulario de login con los errores
        if(!$input){
            $data['titulo'] = 'Login';
            echo view('front/header', $data);
            echo view('front/navbar');
            echo view('usuario/login', ['validation' => $this->validator]);
            echo view('front/footer');
        } else {
            // Si la validación es exitosa, crea un objeto del modelo UsuarioModel
            $model = new UsuarioModel();
            // Busca el usuario por el mail ingresado
            $user = $model->where('UsuarioMail', $this->request->getVar('UsuarioMail'))->first();

            if($user){
                // Verifica si el usuario está activo
                if (!$user['UsuarioActivo']) {
                    return redirect()->back()->with('fail', 'Tu cuenta está desactivada. Contactá al administrador.');
                }

                // Si exite verifica la contraseña
                if(password_verify($this->request->getVar('UsuarioPass'), $user['UsuarioPass'])){
                    $ses_data = [
                        'UsuarioId' => $user['UsuarioId'],
                        'UsuarioNombre' => $user['UsuarioNombre'],
                        'UsuarioMail' => $user['UsuarioMail'],
                        'UsuarioFechaNac' => $user['UsuarioFechaNac'],
                        'PerfilId' => $user['PerfilId'],
                        'logged_in' => TRUE
                    ];

                    // Guarda los datos del usuario en la sesión
                    $session = session();
                    $session->set($ses_data);
                    $session->setFlashdata('success', 'Bienvenido ' . $user['UsuarioNombre']);

                    if ($user['PerfilId'] == 1) {
                        // Si el usuario es administrador, redirige al panel de administración
                        return redirect()->to('admin');
                    } elseif ($user['PerfilId'] == 2) {
                        // Si el usuario es cliente, redirige al panel del cliente
                        return redirect()->to('cliente');
                    }
                    // return redirect()->to('/'); // Redirigir a la página de inicio
                } else {
                    // Si la contraseña es incorrecta, muestra un mensaje de error
                    session()->setFlashdata('fail', 'Contraseña incorrecta');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('fail', 'El usuario no existe');
                return redirect()->to('/login');
            }
        } 
    }
// Funcion para dar de baja logica de los productos
    public function eliminarUsuario($id) {
        $this->UsuarioModel->eliminarUsuario($id);
        return redirect()->to('admin/usuarios');
    }

    // Funcion para dar de alta logica los productos
    public function activarUsuario($id) {
        $this->UsuarioModel->update($id, ['UsuarioActivo'=> TRUE]);
        return redirect()->to('admin/usuarios');
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}