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
        if(session()->get('PerfilId') == '2'){
            // entonces redirecciona a la pagina de login page
            return redirect()->to('/cliente');
        }
        // else {
        //     // si el usuario esta logueado y es admin, entonces continua
        //     return redirect()->to('/');
        // }

    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        
    }
}