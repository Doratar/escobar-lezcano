<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;

class ClienteController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index(){
        $data['titulo'] = 'Inicio';
        $data['usuario'] = session()->get('usuario');
        echo view('front/header', $data);
        echo view('cliente/cliente-navbar');
        echo view('front/carrousel');
        echo view('front/footer');
    }

    protected function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}