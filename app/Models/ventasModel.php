<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class VentasModel extends Model
{
    protected $table = 'ventas_cabecera';

    protected $primaryKey = 'ventasId';
    protected $allowedFields = [
        'ventasFecha',
        'ventasTotal',
        'usuarioId',
    ];

    public function getVentas($usuarioId)
    {
        return $this->where('usuarioId', $usuarioId)->findAll();
    }
    public function getVentasTotal()
    {
        return $this->findAll();
    }
}