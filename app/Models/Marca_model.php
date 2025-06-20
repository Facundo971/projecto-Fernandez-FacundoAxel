<?php
namespace App\Models;
use CodeIgniter\Model;

class Marca_model extends Model{
    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
    protected $allowedFields = ['descripcion', 'activo'];

    public function getMarcaAll() {
        return $this->findAll();
    }
}