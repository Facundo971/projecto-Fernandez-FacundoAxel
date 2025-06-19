<?php
namespace App\Models;
use CodeIgniter\Model;

class Consulta_model extends Model{
    protected $table = 'consultas';
    protected $primaryKey = 'id_consulta';
    protected $allowedFields = ['nombre', 'apellido', 'dni', 'telefono', 'email', 'consulta', 'leido', 'baja'];

    public function getConsultaAll() {
        return $this->findAll();
    }
}