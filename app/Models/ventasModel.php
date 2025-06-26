<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $table = 'ventas_cabecera';

    protected $primaryKey = 'ventasId';
    protected $allowedFields = [
        'ventasFecha',
        'ventasTotal',
        'usuarioId',
    ];

    public function getBuilderVentas_cabecera()
    {
        // Conecta a la base de datos usando el helper de configuración de CodeIgniter
        $db = \Config\Database::connect();

        // Crea un query builder sobre la tabla ventas_cabecera
        $builder = $db->table('ventas_cabecera');

        $builder->select('*'); // Selecciona todas las columnas

        // JOIN con la tabla usuarios
        $builder->join('usuarios', 'usuarios.UsuarioId = ventas_cabecera.UsuarioId');

        // Ejecuta la consulta y devuelve los resultados como un array asociativo
        $query = $builder->get();
        return $query->getResultArray();
    }

    // Esta función devuelve las ventas según si se pasa o no un $id_usuario
    public function getVentas($id_usuario = null)
    {
        // Si no se pasa un ID de usuario (es null)
        if ($id_usuario === null) {
            // Llama a la función que devuelve todas las ventas
            return $this->getBuilderVentas_cabecera();
        } else {
            $db = \Config\Database::connect();
            $builder = $db->table('ventas_cabecera');
            $builder->select('*');
            $builder->join('usuarios', 'usuarios.UsuarioId = ventas_cabecera.UsuarioId');
            $builder->where('ventas_cabecera.UsuarioId', $id_usuario);

            $query = $builder->get();
            return $query->getResultArray();
        }
    }

    //public function getVentas($usuarioId){
    //    return $this->where('usuarioId', $usuarioId)->findAll(); }

    public function getVentasTotal()
    {
        return $this->findAll();
    }
}