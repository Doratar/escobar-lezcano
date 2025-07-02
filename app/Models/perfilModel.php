<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfilModel extends Model
{
    protected $table            = 'perfiles';          // Nombre de la tabla
    protected $primaryKey       = 'PerfilId';          // Clave primaria
    protected $allowedFields    = ['PerfilDescripcion']; // Campos permitidos para insert/update

    // Opcionalmente, si tenés campos tipo fecha:
    // protected $useTimestamps = true;
}
