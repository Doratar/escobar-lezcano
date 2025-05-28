<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;
Use App\Models\ProductoModel;

class AdminController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index(){
        $data['titulo'] = 'Productos';
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->findAll();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('productos/tabla-productos', $data);
        echo view('front/footer');
    }

    public function productos()
    {

        $data['titulo'] = 'Productos';
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->findAll();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('productos/tabla-productos', $data);
        echo view('front/footer');
    }

    protected function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}