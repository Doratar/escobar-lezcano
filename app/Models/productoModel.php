<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class ProductoModel extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'prodId';
    protected $allowedFields = [
        'prodNombre',
        'prodDescripcion',
        'prodPrecio',
        'cateId',
        'prodImagenUrl',
        'prodMarca',
        'prodStock',
        'prodStockMinimo',
        'prodActivo'
    ];

    public function getProductos()
    {
        return $this->findAll();
    }

    public function getProductosActivos()
    {
        return $this->where('prodActivo', 1)->where('prodStock >', 0)->findAll();
    }

    public function getProductoById($id)
    {
        return $this->find($id);
    }

    public function getProductoVariante($id)
    {
        return $this->where('prodId', $id)->first();
    }

    public function getProductosByCategoria($categoriaId)
    {
        return $this->where('cateId', $categoriaId)->findAll();
    }

    public function actualizarStock($producto_id, $cantidad_vendida)
    {
        $producto = $this->find($producto_id);

        if ($producto) {
            $nuevo_stock = max(0, $producto['prodStock'] - $cantidad_vendida);
            return $this->update($producto_id, ['prodStock' => $nuevo_stock]);
        }

        return false;
    }

    public function createProducto($data)
    {
        return $this->insert($data);
    }

    public function updateProducto($id, $data)
    {
        return $this->update($id, $data);
    }

    public function eliminarProducto($id) {
        return $this->update($id, ['prodActivo'=> FALSE]);
    }
}