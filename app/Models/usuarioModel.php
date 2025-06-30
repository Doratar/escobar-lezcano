<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class UsuarioModel extends Model
{
    // ...
    protected $table = 'usuarios';
    protected $primaryKey = 'UsuarioId';
    protected $allowedFields = [
        'UsuarioNombre',
        'UsuarioApellido',
        'UsuarioMail',
        'UsuarioPass',
        'UsuarioFechaNac',
        'UsuarioActivo',
        'PerfilId'
    ];

    public function getUsuarios()
    {
        return $this->findAll();
    }

    public function getUsuariosConPerfil($idUsuarioActual)
    {
        return $this->select('*') 
                ->join('perfiles', 'usuarios.PerfilId = perfiles.PerfilId')
                ->where('usuarios.UsuarioId !=', $idUsuarioActual)
                ->findAll();
    }

    public function getUsuarioById($id)
    {
        return $this->find($id);
    }

    public function createUsuario($data)
    {
        return $this->insert($data);
    }

    public function eliminarUsuario($id) {
        return $this->update($id, ['UsuarioActivo'=> FALSE]);
    }
}