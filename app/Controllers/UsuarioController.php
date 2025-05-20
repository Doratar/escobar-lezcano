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
        $input =$this->validate([]);

        $formModel = new UsuarioModel();
        
        if($input){
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
            return $this->response->redirect('/registro');
        }
    }

}