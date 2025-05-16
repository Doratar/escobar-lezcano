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
        echo view('usuario/registro');
        echo view('front/footer');
    }
    public function formValidation(){
        $input=$this->validate([
            'UsuarioNombre'=>'required|min_length[3]',
            'UsuarioApellido'=>'required|min_length[3]|max_lengh[25]',
            'UsuarioMail'=>'required|min_length[4]|max_lengh[100]|valid_email|is_unique[usuario.email]',
            'UsuarioPass'=>'required|min_length[3]|max_lengh[10]'
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
                'nombre' => $this->request->getVar('UsuarioNombre'),
                'apellido' => $this->request->getVar('UsuarioApellido'),
                'mail' => $this->request->getVar('UsuarioMail'),
                'pass' => password_hash($this->request->getVar('UsuarioPass'), PASSWORD_DEFAULT),
            ]);

            session()->setFlashdata('success', 'Usuario registrado con exito');
            return $this->response->redirect('/registro');
        }
    }

}