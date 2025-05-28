<?php
namespace App\Controllers;
Use App\Models\UsuarioModel;
Use CodeIgniter\Controller;

class ProductoController extends Controller{
    public function __construct()
    {
        helper(['form','url']);
        $this->ProductoModel = new \App\Models\ProductoModel();
    }

     public function create(){
        return
        view('front/header.php', ['titulo' => 'productoAlta'])
        .view('front/navbar.php')
        .view('usuario/productoAlta.php')
        .view('front/footer.php');
    }

    public function formValidation() {
        $input = $this->validate([
            'prodNombre' => 'required|min_length[3]',
            'prodDescripcion' => 'required|min_length[10]',
            'prodPrecio' => 'required|numeric',
            'cateId' => 'required|integer',
            'prodImagenUrl' => 'required',
            'prodMarca' => 'required|min_length[2]'
        ]);

        if(!$input) {
            return view('front/header.php', ['titulo' => 'productoAlta'])
            .view('front/navbar.php')
            .view('usuario/productoAlta.php', ['validation' => $this->validator])
            .view('front/footer.php');
        }

    }
}