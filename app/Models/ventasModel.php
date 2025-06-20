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
        'ventasTotal',
        'usuariosId',
    ];

    public function getVentas($usuarioId)
    {
        return $this->where('usuarioId', $usuarioId)->findAll();
    }

}