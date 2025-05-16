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
        $input =$this->validate([
            'UsuarioNombre'=>'required|min_length[3]',
            'UsuarioApellido'=>'required|min_length[3]|max_lengh[25]',
            'UsuarioMail'=>'required|min_length[4]|max_lengh[100]|valid_email|is_unique[usuario.email]',
            'UsuarioPass'=>'required|min_length[3]|max_lengh[10]',
            'UsuarioFechaNac'=>'required',
        ]);

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