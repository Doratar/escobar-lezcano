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
        'prodImagenURL',
        'prodMarca'
    ];

    public function getProductos()
    {
        return $this->findAll();
    }

    public function getProductosActivos()
    {
        return $this->where('prodActivo', 1)->findAll();
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


    public function createProducto($data)
    {
        return $this->insert($data);
    }

    public function updateProducto($id, $data)
    {
        return $this->update($id, $data);
    }
}