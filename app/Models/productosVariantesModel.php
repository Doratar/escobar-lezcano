<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class ProductosVariantesModel extends Model
{
    // ...
    protected $table = 'productosvariantes';
    protected $primaryKey = 'varianteId';
    protected $allowedFields = ['prodId', 'colorId', 'talleId', 'varianteStock'];

    public function getVariantesByProductoId($prodId)
    {
        return $this->where('prodId', $prodId)->findAll();
    }

    public function insertVariante($data)
    {
        return $this->insert($data);
    }
}