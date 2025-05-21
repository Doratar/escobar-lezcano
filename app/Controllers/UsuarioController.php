<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;

class UsuarioController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
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
            // TODO 'UsuarioConfirmarPass'=> 'matches[UsuarioPass]', // tira error cuando no es error
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
            // TODO HACER EL RESTO DE MENSAJES
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

}