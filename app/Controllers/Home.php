<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('principal.php');
    }

    public function nosotros(): string {
        return view('nosotros.php');
    }
    public function comercializacion(): string {
        return view('comercializacion.php');
    }
    public function contacto(): string {
        return view('contacto.php');
    }
    public function terminos(): string {
        return view('terminos.php');
    }
}
