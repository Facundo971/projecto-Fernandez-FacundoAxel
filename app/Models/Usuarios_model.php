<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja'];

    public function getUsuarioAll() {
        return $this->select('usuarios.*, perfiles.descripcion as perfiles_descripcion')
                    ->join('perfiles', 'perfiles.id_perfil = usuarios.perfil_id')
                    ->findAll();
    }
}