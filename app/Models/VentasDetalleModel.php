<?php

namespace App\Models;
use CodeIgniter\Model;


class VentasDetalleModel extends Model
{
    protected $table      = 'ventas_detalle';
    protected $primaryKey = 'vdetalleId';

    protected $allowedFields = [
        'ventasId',
        'prodId',
        'vdetalleCantidad',
        'vdetallePrecio'
    ];
}