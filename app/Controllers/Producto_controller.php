<?php
namespace App\Controllers;
use CodeIgniter\Controller; 
use App\Models\Producto_model;
use App\Models\Categoria_model;
use App\models\Usuarios_model;

class Producto_controller extends Controller{
    public function __construct(){
        helper(['url', 'form']);
        $session = session();
    }

    public function index(){
        $productoModel = new Producto_model();

        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'NetShop | Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('plantillas/listaProductos', $data);
        echo view('plantillas/footer');
    }

    public function crearProducto(){
        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->getCategoriaAll();

        $dato['titulo'] = 'NetShop | Agregar Producto';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('plantillas/altaDeProductos', $data);
        echo view('plantillas/footer');
    }

    public function formValidation(){
        $input = $this->validate([
            'nombre'    => 'required|trim|regex_match[/^([\p{L}\s])+$/u]|min_length[2]|max_length[50]',
            'categoria' => 'required',
            'precio'    => 'required|trim|numeric|greater_than[0]',
            'precioVta' => 'required|trim|numeric|greater_than[0]',
            'stock'     => 'required|trim|is_natural',
            'stockMin'  => 'required|trim|is_natural',
            'imagen'    => 'uploaded[imagen]' 
        ]);

        // Si la validación NO pasa, mostramos el formulario con errores
        if(!$input){
            $categoria_model = new Categoria_model();
            $data['categorias'] = $categoria_model->getCategoriaAll();
            $data['validation'] = $this->validator;  // Contiene los errores

            $dato['titulo'] = 'NetShop | Agregar Producto';
            echo view('plantillas/header', $dato);
            echo view('plantillas/nav');
            echo view('plantillas/altaDeProductos', $data);
            echo view('plantillas/footer');
        } else {
            // La validación pasó, procesamos el archivo e insertamos en la base de datos.
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_producto' => $this->request->getVar('nombre'),
                'imagen'          => $nombre_aleatorio,  // Usamos el nombre generado
                'categoria_id'    => $this->request->getVar('categoria'),
                'precio'          => $this->request->getVar('precio'),
                'precio_vta'      => $this->request->getVar('precioVta'),
                'stock'           => $this->request->getVar('stock'),
                'stock_min'       => $this->request->getVar('stockMin'),
                // 'eliminado' => 'NO'  // Si es necesario, lo ajustas según tu BD
            ];

            $producto = new Producto_model();
            $producto->insert($data);
            session()->setFlashdata('success', 'Producto Registrado con Exito');
            return $this->response->redirect(site_url('altaDeProductos'));
        }
    }
}