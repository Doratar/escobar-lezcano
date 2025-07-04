<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['cart'] = \Config\Services::cart();
        return 
        view('front/header.php', ['titulo' => 'Home'])
        .view('front/navbar.php',$data)
        .view('front/carrousel.php')
        .view('front/principal.php')
        .view('front/footer.php');
    }

    public function nosotros(): string {
        $data['cart'] = \Config\Services::cart();
        return 
        view('front/header.php', ['titulo' => 'Nosotros'])
        .view('front/navbar.php',$data)
        .view('front/nosotros.php')
        .view('front/footer.php');
    }
    public function comercializacion(): string {
        $data['cart'] = \Config\Services::cart();
        return 
        view('front/header.php', ['titulo' => 'Comercializacion'])
        .view('front/navbar.php',$data)
        .view('front/comercializacion.php')
        .view('front/footer.php');
    }
    public function contacto(): string {
        $data['cart'] = \Config\Services::cart();
        return 
        view('front/header.php', ['titulo' => 'Contacto']) 
        .view('front/navbar.php',$data)
        .view('front/contacto.php')
        .view('front/footer.php');
    }
    public function terminos(): string {
        $data['cart'] = \Config\Services::cart();
        return 
        view('front/header.php', ['titulo' => 'Terminos y condiciones'])
        .view('front/navbar.php',$data)
        .view('terminos.php')
        .view('front/footer.php');
    }
    public function producto(): string {
        return 
        view('front/header.php', ['titulo' => 'Productos'])
        .view('front/navbar.php')
        .view('front/producto')
        .view('front/footer.php');
    }

    public function registro() : string {
        return
        view('front/header.php', ['titulo' => 'Registro'])
        .view('front/navbar.php')
        .view('usuario/registro.php')
        .view('front/footer.php');
    }
}
