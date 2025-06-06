<?php

namespace App\Models;

use CodeIgniter\Model;
use Modules\Authentication\Models\UserAuthModel;

class ConsultasModel extends Model
{
    protected $table = 'consultas';

    protected $primaryKey = 'consultasId';
    protected $allowedFields = [
        'consultasFecha',
        'consultasMail',
        'consultasTelefono',
        'consultasDetalle'
    ];
    public function createConsulta($data)
    {
        return $this->insert($data);
    }
}
