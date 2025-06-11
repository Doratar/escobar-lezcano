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
        'consultasDetalle',
        'consultasAtendido'
    ];
    public function createConsulta($data)
    {
        return $this->insert($data);
    }

    public function getConsultas()
    {
        return $this->findAll();
    }

    public function updateConsulta($id, $data)
    {
        return $this->update($id, $data);
    }

    public function marcarLeido($id)
    {
        $data = ['consultasAtendido' => 'SI'];
        return $this->update($id, $data);
    }
}
