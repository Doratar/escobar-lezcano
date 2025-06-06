<?php
namespace App\Controllers;
Use App\Models\ConsultasModel;
Use CodeIgniter\Controller;

class ConsultasController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index(){
        $data['titulo'] = 'Consultas';
        $data['usuario'] = session()->get('UsuarioMail');
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('contacto', $data);
        echo view('front/footer');
    }

    public function formValidation(){
        $input = $this->validate([
            'consultasFecha' => 'required',
            'consultasMail' => 'required|valid_email',
            'consultasTelefono' => 'required|min_length[10]|max_length[15]',
            'consultasDetalle' => 'required|min_length[10]'
        ], 
        [
            'consultasFecha' => ['required' => 'La fecha es obligatoria'],
            'consultasMail' => [
                'required' => 'El correo es obligatorio',
                'valid_email' => 'El formato del correo es incorrecto'
            ],
            'consultasTelefono' => [
                'required' => 'El teléfono es obligatorio',
                'min_length' => 'El teléfono debe tener al menos 10 caracteres',
                'max_length' => 'El teléfono no puede tener más de 15 caracteres'
            ],
            'consultasDetalle' => [
                'required' => 'El detalle es obligatorio',
                'min_length' => 'El detalle debe tener al menos 10 caracteres'
            ]
        ]);

        if(!$input){
            $data['titulo'] = 'Consultas';
            echo view('front/header', $data);
            echo view('front/navbar');
            echo view('contacto', ['validation' => $this->validator]);
            echo view('front/footer');
        } else {
            $model = new ConsultasModel();
            $data = [
                'consultasFecha' => date('Y-m-d H:i:s'),
                'consultasMail' => $this->request->getPost('consultasMail'),
                'consultasTelefono' => $this->request->getPost('consultasTelefono'),
                'consultasDetalle' => $this->request->getPost('consultasDetalle')
            ];
            
            if($model->createConsulta($data)){
                return redirect()->to(base_url('/contacto'))->with('success', 'Consulta enviada correctamente.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Error al enviar la consulta.');
            }
        }
    }

}