<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use App\Models\CategoriaModel;
Use CodeIgniter\Controller;

class ProductoController extends Controller{

    protected $ProductoModel;
    protected $session;
    public function __construct()
    {
        helper(['form','url']);
        $this->session = session();

    }

    public function agregarVariante(){
        if(!$this->session->get('perfilId')){
            return redirect()->to(base_url('/login'));
        }

        $data = [];
        $data['titulo'] = 'Agregar Variante de Producto';
        
    }
}