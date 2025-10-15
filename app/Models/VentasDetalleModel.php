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

    public function getMasVendidos($limit){
        return $this->select('productos.prodId, productos.prodNombre, productos.prodDescripcion, productos.prodPrecio, productos.prodImagenURL, SUM(ventas_detalle.vdetalleCantidad) AS total_vendido', false)
                ->join('productos', 'productos.prodId = ventas_detalle.prodId')
                ->groupBy('ventas_detalle.prodId')
                ->orderBy('total_vendido', 'DESC')
                ->limit($limit)
                ->findAll();

    }
}