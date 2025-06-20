<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class  CategoriaModel extends Model
{
    // ...
    protected $table = 'categorias';
    protected $primaryKey = 'cateId';
    protected $allowedFields = ['cateNombre'];

    public function getCategorias()
    {
        return $this->findAll();
    }

    public function getCategoriaById($id)
    {
        return $this->find($id);
    }
    public function updateCategoria($id, $data)
    {
        return $this->update($id, $data);
    }
}
