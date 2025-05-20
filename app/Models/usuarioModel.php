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
        'UsuarioEmail',
        'UsuarioPass',
        'UsuarioFechaNac',
        'UsuarioActivo'
    ];
}