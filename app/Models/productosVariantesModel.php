<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class ProductosVariantesModel extends Model
{
    // ...
    protected $table = 'productosvariantes';
    protected $primaryKey = 'varianteId';
    protected $allowedFields = ['varianteId','prodId', 'colorId', 'talleId', 'varianteStock'];
}