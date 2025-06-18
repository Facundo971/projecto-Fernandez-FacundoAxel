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
// select
// El método "select()" para definir qué columnas se van a recuperar de la base de datos.
// El "productos.*" significa que seleccionará todas las columnas de la tabla productos.
// El "categorias.descripcion as categoria_descripcion" selecciona la columna descripcion de la tabla categorias y la renombra como "categoria_descripcion" para utilizar.

// join
// El "->join('categorias', 'categorias.id = productos.categoria_id')" realiza una JOIN(sirve para unir filas de dos tablas basadas en una columna común.) entre las tablas productos y categorias. ("categorias" Este es el nombre de la tabla que se va a unir a la consulta. En este caso, estás indicando que quieres traer datos de la tabla denominada "categorias".)
// El "categorias.id = productos.categoria_id" significa que se enlazan las tablas usando la columna "categoria_id" de la tabla "productos", la cual debe coincidir con "id" de la tabla "categorias". ("categorias.id = productos.categoria_id" Esta es la condición que establece cómo se relacionan las dos tablas. Significa que la columna id de la tabla categorias debe coincidir con la columna categoria_id de la tabla productos. Es decir, por cada registro en "productos", busca aquel registro en "categorias" donde el id sea igual al categoria_id asociado al producto.)

// findAll
// El método "findAll()" ejecuta la consulta y recupera todos los registros.