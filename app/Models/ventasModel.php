<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class VentasModel extends Model
{
    protected $table = 'ventas';

    protected $primaryKey = 'ventasId';
    protected $allowedFields = [
        'ventasFecha',
        'usuariosId',
        'ventasTotal'
    ];

    public function getVentas()
    {
        return $this->findAll();
    }

}