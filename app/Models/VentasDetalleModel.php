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

    public function getDetalle($ventaId){

        return $this->select('*')->join('productos', 'productos.prodId = ventas_detalle.prodId')->where('ventasId', $ventaId)->findAll();

        //return $this->where('ventaId', $ventaId)->findAll();
    }
}