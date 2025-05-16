<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class perfilModel extends Model
{
    // ...
    protected $table = 'perfiles';
    protected $primaryKey = 'PerfilId';
    protected $allowedFields = [
        'PerfilDescripcion',
    ];
}