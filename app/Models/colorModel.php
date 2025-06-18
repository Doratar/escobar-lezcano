<?php

namespace App\Models;

use CodeIgniter\Model;

class ColorModel extends Model
{
    protected $table      = 'colores';
    protected $primaryKey = 'colorId';

    protected $allowedFields = ['colorNombre'];

    public function getColores()
    {
        return $this->findAll();
    }

    public function getColorById($id)
    {
        return $this->find($id);
    }
}