<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;

class CarritoController extends BaseController{
    public function __construct()
    {
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::cart();
        $session = session();
    }

    public function index(){
        $data['titulo'] = 'Inicio';
        $data['usuario'] = session()->get('usuario');
        echo view('front/header', $data);
        echo view('cliente/cliente-navbar');
        echo view('front/footer');
    }

    protected function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}