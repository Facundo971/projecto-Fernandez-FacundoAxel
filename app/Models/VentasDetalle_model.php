<?php
namespace App\Models;
use CodeIgniter\Model;

class VentasDetalle_model extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio'];

    public function getVentasDetalleAll() {
        return $this->findAll();
    }

    public function getDetalles($ventaId) {
        return $this->where('venta_id', $ventaId)->findAll();
    }
}