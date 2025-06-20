<?php
namespace App\Controllers;
use CodeIgniter\Controller; 
use App\Models\Producto_model;
use App\Models\Categoria_model;
use App\Models\Marca_model;
use App\models\Usuarios_model;

class Producto_controller extends Controller{
    public function __construct(){
        helper(['url', 'form']);
        $session = session();
    }

    public function index(){
        $productoModel = new Producto_model();

        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductos', $data);
        echo view('plantillas/footer');
    }

    public function buscadorProductos(){
        $session = session();
        $queryProducto = $this->request->getVar('productoQuery'); 
        $productoModel = new Producto_model();

        if($queryProducto){ 
            $data['productos'] = $productoModel->like('nombre_producto', $queryProducto)->where('eliminado', 'NO')->select('productos.*, categorias.descripcion as categoria_descripcion')->join('categorias', 'categorias.id = productos.categoria_id')->findAll();
        } else {
            $data['productos'] = [];
        }

        $session->setFlashdata('productoQueryValor', $queryProducto);
        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductos', $data);
        echo view('plantillas/footer');
    }

    public function indexDesactivados(){
        $productoModel = new Producto_model();

        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductosDesactivados', $data);
        echo view('plantillas/footer');
    }

    public function buscadorProductosDesactivados(){
        $session = session();
        $queryDesactivadoProducto = $this->request->getVar('productoDesactivadoQuery'); 
        $productoModel = new Producto_model();

        if($queryDesactivadoProducto){ 
            $data['productos'] = $productoModel->like('nombre_producto', $queryDesactivadoProducto)->where('eliminado', 'SI')->select('productos.*, categorias.descripcion as categoria_descripcion')->join('categorias', 'categorias.id = productos.categoria_id')->findAll();
        } else {
            $data['productos'] = [];
        }

        $session->setFlashdata('productoDesactivadoQueryValor', $queryDesactivadoProducto);
        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductosDesactivados', $data);
        echo view('plantillas/footer');
    }

    public function indexParaActivar(){
        $productoModel = new Producto_model();

        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductosParaActivar', $data);
        echo view('plantillas/footer');
    }

    public function buscadorProductosParaActivar(){
        $session = session();
        $queryProductoParaActivar = $this->request->getVar('productoParaActivarQuery');
        $productoModel = new Producto_model();

        if($queryProductoParaActivar){ 
            $data['productos'] = $productoModel->like('nombre_producto', $queryProductoParaActivar)->where('eliminado', 'SI')->select('productos.*, categorias.descripcion as categoria_descripcion')->join('categorias', 'categorias.id = productos.categoria_id')->findAll();
        } else {
            $data['productos'] = [];
        }

        $session->setFlashdata('productoParaActivarQueryValor', $queryProductoParaActivar);
        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductosParaActivar', $data);
        echo view('plantillas/footer');
    }

    public function indexActualizarEliminar(){
        $productoModel = new Producto_model();

        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductosActualizarEliminar', $data);
        echo view('plantillas/footer');
    }

    public function buscadorProductosAct(){
        $session = session();
        $queryProductoAct = $this->request->getVar('productoActQuery'); 
        $productoModel = new Producto_model();

        if($queryProductoAct){ 
            $data['productos'] = $productoModel->like('nombre_producto', $queryProductoAct)->where('eliminado', 'NO')->select('productos.*, categorias.descripcion as categoria_descripcion')->join('categorias', 'categorias.id = productos.categoria_id')->findAll();
        } else {
            $data['productos'] = [];
        }

        $session->setFlashdata('productoActQueryValor', $queryProductoAct);
        $dato['titulo'] = 'Dashboard | Lista de Productos';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaProductosActualizarEliminar', $data);
        echo view('plantillas/footer');
    }

    public function crearProducto(){
        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->getCategoriaAll();
        $marcaModel = new Marca_model();
        $data['marcas'] = $marcaModel->getMarcaAll();

        $dato['titulo'] = 'Dashboard | Agregar Producto';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/altaDeProductos', $data);
        echo view('plantillas/footer');
    }

    public function actualizarProducto($id){
        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->findAll();
        $productoModel = new Producto_model();
        $data['producto'] = $productoModel->find($id);
        $marcaModel = new Marca_model();
        $data['marcas'] = $marcaModel->getMarcaAll();

        $dato['titulo'] = 'Dashboard | Editar Producto';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/actualizarProductos', $data);
        echo view('plantillas/footer');
    }

    public function eliminarProducto($id){
        $productoModel = new Producto_model();
        $data['producto'] = $productoModel->find($id);

        $data = ['eliminado' => 'SI'];
        $productoModel->update($id, $data);

        session()->setFlashdata('msgExitoso', 'Producto desactivado exitosamente');
        return redirect()->to('/mostrarListaProductosActualizarEliminar');
    }

    public function activarProducto($id){
        $productoModel = new Producto_model();
        $data['producto'] = $productoModel->find($id);

        $data = ['eliminado' => 'NO'];
        $productoModel->update($id, $data);

        session()->setFlashdata('msgExitoso', 'Producto activado exitosamente');
        return redirect()->to('/mostrarListaProductosParaActivar');
    }

    public function formValidation(){
        $session = session();

        $productoNombre = $this->request->getVar('nombre');
        $productoDescripcion = $this->request->getVar('descripcion');
        $productoCategoria = $this->request->getVar('categoria');
        $productoMarca = $this->request->getVar('marca');
        $productoPrecio = $this->request->getVar('precio');
        $productoPrecioVta = $this->request->getVar('precioVta');
        $productoStock = $this->request->getVar('stock');
        $productoStockMin = $this->request->getVar('stockMin');

        $input = $this->validate([
            'nombre'    => 'required|trim|min_length[2]|max_length[50]',
            'categoria' => 'required',
            'marca'     => 'required',
            'precio'    => 'required|trim|numeric|greater_than[0]',
            'precioVta' => 'required|trim|numeric|greater_than[0]',
            'stock'     => 'required|trim|is_natural',
            'stockMin'  => 'required|trim|is_natural',
            'imagen'    => 'uploaded[imagen]|max_size[imagen,8192]|ext_in[imagen,png,jpg,jpeg]',
            'descripcion' => 'required|trim|min_length[5]|max_length[255]',
        ]);

        if(!$input){
            $categoria_model = new Categoria_model();
            $data['categorias'] = $categoria_model->getCategoriaAll();
            $marcaModel = new Marca_model();
            $data['marcas'] = $marcaModel->getMarcaAll();
            $data['validation'] = $this->validator;

            $session->setFlashdata('productoValor', $productoNombre);
            $session->setFlashdata('descripcionProductoValor', $productoDescripcion);
            $session->setFlashdata('categoriaProductoValor', $productoCategoria);
            $session->setFlashdata('marcaProductoValor', $productoMarca);
            $session->setFlashdata('precioProductoValor', $productoPrecio);
            $session->setFlashdata('precioVtaProductoValor', $productoPrecioVta);
            $session->setFlashdata('stockProductoValor', $productoStock);
            $session->setFlashdata('stockMinProductoValor', $productoStockMin);

            $dato['titulo'] = 'Dashboard | Agregar Producto';
            echo view('plantillas/header', $dato);
            echo view('plantillas/nav');
            echo view('back/admin/altaDeProductos', $data);
            echo view('plantillas/footer');
        } else {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre_producto' => $this->request->getVar('nombre'),
                'imagen'          => $nombre_aleatorio,
                'categoria_id'    => $this->request->getVar('categoria'),
                'precio'          => $this->request->getVar('precio'),
                'precio_vta'      => $this->request->getVar('precioVta'),
                'stock'           => $this->request->getVar('stock'),
                'stock_min'       => $this->request->getVar('stockMin'),
                'descripcion'     => $this->request->getVar('descripcion'),
                'marca_id'    => $this->request->getVar('marca'),
            ];

            $producto = new Producto_model();
            $producto->insert($data);
            session()->setFlashdata('msgExitoso', 'Producto registrado exitosamente');
            return $this->response->redirect(site_url('altaDeProductos'));
        }
    }

    public function formValidationUpdate(){
        $input = $this->validate([
            'id'        => 'required|numeric',
            'nombre'    => 'required|trim|min_length[2]|max_length[50]',
            'categoria' => 'required',
            'precio'    => 'required|trim|numeric|greater_than[0]',
            'precioVta' => 'required|trim|numeric|greater_than[0]',
            'stock'     => 'required|trim|is_natural',
            'stockMin'  => 'required|trim|is_natural',
            'imagen'    => 'max_size[imagen,8192]|ext_in[imagen,png,jpg,jpeg]',
            'descripcion' => 'required|trim|min_length[5]|max_length[255]',
            'marca'     => 'required'
        ]);
        if(!$input){
            $productoModel = new Producto_model();
            $categoria_model = new Categoria_model();
            $data['categorias'] = $categoria_model->getCategoriaAll();
            $marcaModel = new Marca_model();
            $data['marcas'] = $marcaModel->getMarcaAll();
            $data['producto'] = $productoModel->find($this->request->getVar('id'));
            $data['validation'] = $this->validator;

            $dato['titulo'] = 'Dashboard | Editar Producto';
            echo view('plantillas/header', $dato);
            echo view('plantillas/nav');
            echo view('back/admin/actualizarProductos', $data);
            echo view('plantillas/footer');
        } else {
            $data = [
                'id'              => $this->request->getVar('id'),
                'nombre_producto' => $this->request->getVar('nombre'),
                'categoria_id'    => $this->request->getVar('categoria'),
                'precio'          => $this->request->getVar('precio'),
                'precio_vta'      => $this->request->getVar('precioVta'),
                'stock'           => $this->request->getVar('stock'),
                'stock_min'       => $this->request->getVar('stockMin'),
                'descripcion'     => $this->request->getVar('descripcion'),
                'marca_id'    => $this->request->getVar('marca'),
            ];

            $img = $this->request->getFile('imagen');
            if ($img->isValid() && !$img->hasMoved()) {
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'assets/uploads', $nombre_aleatorio);
                $data['imagen'] = $nombre_aleatorio;
            }

            $productoModel = new Producto_model();
            $id = $this->request->getVar('id');
            $productoModel->update($id, $data);

            session()->setFlashdata('msgExitoso', 'Producto actualizado exitosamente');
            return $this->response->redirect(site_url('mostrarListaProductosActualizarEliminar'));
        }
    }

    public function limpiarDatos() {
        session()->remove(['productoValor', 'descripcionProductoValor', 'categoriaProductoValor', 'marcaProductoValor', 'precioProductoValor', 'precioVtaProductoValor', 'stockProductoValor', 'stockMinProductoValor']);
        return redirect()->to('/altaDeProductos');
    }

    public function limpiarDatosAct($id) {
        session()->setFlashdata('limpiarProductoValor', true);
        return redirect()->to('/actualizarProductos/' . $id);
    }
}