<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    //public function before(RequestInterface $request, $arguments = null){
        // si el usuario no esta logueado
        //if(session()->get('logged_in')){
            // entonces redirecciona a la pagina de login page
            //return redirect()->to('/');}}

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Si no está logueado
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('fail', 'Debes iniciar sesión.');
        }

        // Si hay argumentos como 'admin', 'cliente', etc.
        if ($arguments) {
            $perfilId = $session->get('PerfilId');

            // Mapeo de roles a PerfilId
            $roles = [
                'admin' => 1,
                'user'  => 2,
            ];

            $rolEsperado = $roles[$arguments[0]] ?? null;

            if ($rolEsperado !== null && $perfilId != $rolEsperado) {
                $rutaRedireccion = ($rolEsperado === 1) ? '/' : 'admin';
                return redirect()->to($rutaRedireccion)->with('fail', 'No tienes permisos para acceder a esta sección.');
            }
        }

        // Si está logueado y tiene permiso, sigue normalmente
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        
    }
}