<?php
namespace App\Models;
use CodeIgniter\Model;

class VentasCabecera_model extends Model{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];

    public function getVentasCabeceraAll() {
        return $this->findAll();
    }

    public function getVentas($idUsuario) {
        return $this->where('usuario_id', $idUsuario)->findAll();
    }
}