<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
use \App\Models\CategoriaModel;
Use CodeIgniter\Controller;
Use App\Models\ProductoModel;
Use App\Models\VentasModel;

class AdminController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
        $this->session = session();
    }

    public function index(){
        //TODO aca deberia ir el dashboard
        $data['titulo'] = 'Dashboard';
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('front/producto');
        echo view('front/footer');
    }

    public function productos()
    {
        // TODO aca va la tabla de productos
        $data['titulo'] = 'Productos';
        $productoModel = new ProductoModel();
        $data['productos'] = $productoModel->getProductos();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('productos/tabla-productos', $data);
        echo view('front/footer');
    }
    public function ventas()
    {
        // TODO aca va la tabla de productos
        $data['titulo'] = 'Ventas';
        $ventasModel = new VentasModel();
        $data['ventas'] = $ventasModel->getVentas();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('admin/tabla-ventas', $data);
        echo view('front/footer');
    }

    public function categorias(){
        // TODO aca va la tabla de categorias
        $data['titulo'] = 'Categorias';
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->findAll();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('admin/tabla-categorias', $data);
        echo view('front/footer');
    }

    public function usuarios(){
        // TODO aca va la tabla de usuarios
        $data['titulo'] = 'Usuarios';
        $usuarioModel = new usuarioModel();
        $data['usuarios'] = $usuarioModel->findAll();
        echo view('front/header', $data);
        echo view('admin/navbar');
        echo view('admin/tabla-usuarios', $data);
        echo view('front/footer');
    }

    protected function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}