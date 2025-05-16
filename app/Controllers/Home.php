<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return 
        view('front/header.php', ['titulo' => 'Home'])
        .view('front/navbar.php')
        .view('front/carrousel.php')
        .view('principal.php')
        .view('front/footer.php');
    }

    public function nosotros(): string {
        return 
        view('front/header.php', ['titulo' => 'Nosotros'])
        .view('front/navbar.php')
        .view('nosotros.php')
        .view('front/footer.php');
    }
    public function comercializacion(): string {
        return 
        view('front/header.php', ['titulo' => 'Comercializacion'])
        .view('front/navbar.php')
        .view('comercializacion.php')
        .view('front/footer.php');
    }
    public function contacto(): string {
        return 
        view('front/header.php', ['titulo' => 'Contacto']) 
        .view('front/navbar.php')
        .view('contacto.php')
        .view('front/footer.php');
    }
    public function terminos(): string {
        return 
        view('front/header.php', ['titulo' => 'Terminos y condiciones'])
        .view('front/navbar.php')
        .view('terminos.php')
        .view('front/footer.php');
    }
    public function tienda(): string {
        return 
        view('front/header.php', ['titulo' => 'Tienda'])
        .view('front/navbar.php')
        .view('tienda.php')
        .view('front/footer.php');
    }
    public function producto(): string {
        return 
        view('front/header.php', ['titulo' => 'Productos'])
        .view('front/navbar.php')
        .view('producto.php')
        .view('front/footer.php');
    }

    public function registro() : string {
        return
        view('front/header.php', ['titulo' => 'Registro'])
        .view('front/navbar.php')
        .view('usuario/registro.php')
        .view('front/footer.php');
    }

    public function registrarUsuario() {
        
    }
    
}
