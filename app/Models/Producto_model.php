<?php
namespace App\Models;
use CodeIgniter\Model;

class Producto_model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_producto', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminado', 'descripcion', 'marca_id'];

    public function getProductoAll(){
    return $this->select('productos.*, categorias.descripcion as categoria_descripcion')
                ->join('categorias', 'categorias.id = productos.categoria_id')
                ->findAll();
    }

    public function getProducto($id) {
        return $this->find($id); 
    }

    public function updateStock($id, $nuevoStock) {
        return $this->update($id, ['stock' => $nuevoStock]);
    }
}