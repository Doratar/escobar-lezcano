<?php

namespace App\Models;

use CodeIgniter\Model;

class TallesModel extends Model
{
    protected $table      = 'talles';
    protected $primaryKey = 'talleId';

    protected $allowedFields = [
        'talleNombre',
    ];

    public function getTalles()
    {
        return $this->findAll();
    }

    public function getTalleById($id)
    {
        return $this->find($id);
    }
}