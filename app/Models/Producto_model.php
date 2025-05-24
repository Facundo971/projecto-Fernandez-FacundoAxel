<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_producto', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminado'];

    // Método para obtener todos los productos.
    public function getProductoAll() {
        return $this->findAll();
    }
}

