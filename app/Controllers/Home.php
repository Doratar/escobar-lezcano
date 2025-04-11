<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return 
        view('front/header.php', ['titulo' => 'Home'])
        .view('front/navbar.php')
        .view('principal.php', ['titulo' => 'Home'])
        .view('front/footer.php'); 
    }

    public function nosotros(): string {
        return view('nosotros.php', ['titulo' => 'Nosotros']);
    }
    public function comercializacion(): string {
        return 
        view('front/header.php', ['titulo' => 'Comercializacion'])
        .view('front/navbar.php')
        .view('comercializacion.php');
    }
    public function contacto(): string {
        return view('contacto.php', ['titulo' => 'Contacto']);
    }
    public function terminos(): string {
        return view('terminos.php', ['titulo' => 'Terminos y condiciones']);
    }
}
