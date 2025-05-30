<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
//use \App\Models\CategoriaModel();
Use CodeIgniter\Controller;
Use App\Models\ProductoModel;

class AdminController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index(){
        //TODO aca deberia ir el dashboard
        $data['titulo'] = 'Dashboard';
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('producto');
        echo view('front/footer');
    }

    public function productos()
    {
        // TODO aca va la tabla de productos
        $data['titulo'] = 'Productos';
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->findAll();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('productos/tabla-productos', $data);
        echo view('front/footer');
    }

    public function categorias(){
        // TODO aca va la tabla de categorias
        $data['titulo'] = 'Categorias';
        //$categoriaModel = new \App\Models\CategoriaModel();
        //$data['categorias'] = $categoriaModel->findAll();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('categorias/tabla-categorias', $data);
        echo view('front/footer');
    }

    protected function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}