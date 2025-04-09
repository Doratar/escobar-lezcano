<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('principal.php', ['titulo' => 'Home']); 
    }

    public function nosotros(): string {
        return view('nosotros.php', ['titulo' => 'Nosotros']);
    }
    public function comercializacion(): string {
        return view('comercializacion.php', ['titulo' => 'Comercalizacion']);
    }
    public function contacto(): string {
        return view('contacto.php', ['titulo' => 'Contacto']);
    }
    public function terminos(): string {
        return view('terminos.php', ['titulo' => 'Terminos y condiciones']);
    }
}
