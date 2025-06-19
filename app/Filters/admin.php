<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // si el usuario no esta logueado
        if(!(session()->get('PerfilId') == 1)){
            // entonces redirecciona a la pagina de login page
            return redirect()->to('/');
        }

    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        
    }
}