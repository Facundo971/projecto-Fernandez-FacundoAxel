<?php
namespace App\Controllers;

use App\Models\Categoria_model;
use App\Models\Marca_model;
use CodeIgniter\Controller; 
use App\Models\Producto_model;
use App\models\Usuarios_model;
use App\Models\VentasCabecera_model;
use App\models\VentasDetalle_model;

class Venta_controller extends Controller{
    public function registrarVenta(){
        $session = session();
        require(APPPATH . 'Controllers/Carrito_controller.php');
        $cartController = new Carrito_controller();
        $carritoContents = $cartController->devolverCarrito();

        $productoModel = new Producto_model();
        $ventasModel = new VentasCabecera_model();
        $detalleModel = new VentasDetalle_model();

        $productosValidos = [];
        $productosSinStock = [];
        $total = 0;

        // Validar stock y filtrar productos válidos
        foreach ($carritoContents as $item) {
            $producto = $productoModel->getProducto($item['id']);
            if ($producto && $producto['stock'] >= $item['qty']) {
                $productosValidos[] = $item;
                $total += $item['subtotal'];
            } else {
                $productosSinStock[] = $item['name']; // Eliminar del carrito el producto sin stock
                $cartController->eliminarProducto($item['rowid']);
            }
        }
        
        // Si hay productos sin stock, avisar y volver al carrito
        if (!empty($productosSinStock)) {
            $mensaje = 'Los siguientes productos: ' . implode(', ', $productosSinStock) . '. No tienen stock suficiente y fueron eliminados de "Mi Carrito"';
            $session->setFlashdata('mensaje', $mensaje);
            return redirect()->to('/carrito');
        }
        
        // Si no hay productos válidos, no se registra la venta
        if (empty($productosValidos)) {
            $session->setFlashdata('mensaje', 'No hay productos válidos para registrar la venta');
            return redirect()->to('/carrito');
        }
        
        // Registrar la venta en las tablas Venta_cabecera y Venta_detalle
        // Registrar cabecera de la venta
        $nuevaVenta = [
            'usuario_id'  => $session->get('id_usuario'),
            'total_venta' => $total
        ];
        $ventaId = $ventasModel->insert($nuevaVenta);
        
        // Registrar detalle y actualizar stock
        foreach ($productosValidos as $item) {
            $detalle = [
                'venta_id'    => $ventaId,
                'producto_id' => $item['id'],
                'cantidad'    => $item['qty'],
                'precio'      => $item['price']
            ];
            $detalleModel->insert($detalle);
            $producto = $productoModel->getProducto($item['id']);
            $productoModel->updateStock($item['id'], $producto['stock'] - $item['qty']);
        }
        
        // Vaciar carrito y mostrar confirmación
        $cartController->eliminarCarrito();
        $session->setFlashdata('mensajeVenta', 'Venta registrada exitosamente');
        return redirect()->to(base_url('vistaDetalleCompra/' . $ventaId));
    }

    public function verFactura($ventaId){
        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->getCategoriaAll();
        $detalleVentasModel = new VentasDetalle_model();
        $data['ventas'] = $detalleVentasModel->getDetalles($ventaId);
        $productoModel = new Producto_model();
        $data['productos'] = $productoModel->getProductoAll();
        $marcaModel = new Marca_model();
        $data['marcas'] = $marcaModel->getMarcaAll();

        $dato['titulo'] = "NetShop | Detalles";
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav', $data);
        echo view('plantillas/detalleDeCompra', $data);
        echo view('plantillas/footer', $data);
    }

    public function misCompras(){
        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->getCategoriaAll();
        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->getUsuarioAll();
        $marcaModel = new Marca_model();
        $data['marcas'] = $marcaModel->getMarcaAll();

        $userId = session()->get('id_usuario');
        $ventasCabeceraModel = new VentasCabecera_model();
        $data['ventas'] = $ventasCabeceraModel->where('usuario_id', $userId)->orderBy('fecha', 'ASC')->findAll();

        $data['titulo'] = "NetShop | Mis Compras";
        echo view('plantillas/header', $data);
        echo view('plantillas/nav', $data);
        echo view('plantillas/misCompras', $data);
        echo view('plantillas/footer', $data);
    }

    public function buscadorVentasDeUnCliente(){
        $session = session();
        $queryFechaInicio20 = $this->request->getVar('fechaInicioQuery20');
        $queryFechaFin20 = $this->request->getVar('fechaFinQuery20'); 

        $categoriaModel = new Categoria_model();
        $data['categorias'] = $categoriaModel->getCategoriaAll();
        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->getUsuarioAll();
        $marcaModel = new Marca_model();
        $data['marcas'] = $marcaModel->getMarcaAll();

        $userId = session()->get('id_usuario');
        $ventaModel = new VentasCabecera_model();
        $fechaFinMasUno = date('Y-m-d', strtotime($queryFechaFin20 . ' +1 day'));

        if($queryFechaInicio20 && $queryFechaFin20 && ($queryFechaInicio20 <= $queryFechaFin20)){ 
            $data['ventas'] = $ventaModel
                ->where('fecha >=', $queryFechaInicio20)
                ->where('fecha <', $fechaFinMasUno)
                ->where('usuario_id', $userId)
                ->orderBy('fecha', 'ASC')
                ->findAll();
        } else {
            $session->setFlashdata('msgFechasIncorrectas', 'Las fechas ingresadas no han generado resultados');
            $data['ventas'] = [];
        }

        $session->setFlashdata('fechaInicioQueryValor20', $queryFechaInicio20);
        $session->setFlashdata('fechaFinQueryValor20', $queryFechaFin20);

        $data['titulo'] = "NetShop | Mis Compras";
        echo view('plantillas/header', $data);
        echo view('plantillas/nav', $data);
        echo view('plantillas/misCompras', $data);
        echo view('plantillas/footer', $data);
    }

    public function index(){
        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->getUsuarioAll();
        $ventasCabeceraModel = new VentasCabecera_model();
        $data['ventas'] = $ventasCabeceraModel->getVentasCabeceraAll();

        $data['titulo'] = "Dashboard | Lista de Ventas";
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('back/admin/listaVentas', $data);
        echo view('plantillas/footer');
    }

    public function buscadorVentas(){
        $session = session();
        $queryFechaInicio = $this->request->getVar('fechaInicioQuery');
        $queryFechaFin = $this->request->getVar('fechaFinQuery'); 

        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->getUsuarioAll();
        $ventaModel = new VentasCabecera_model();
        $fechaFinMasUno = date('Y-m-d', strtotime($queryFechaFin . ' +1 day'));

        if($queryFechaInicio && $queryFechaFin && ($queryFechaInicio <= $queryFechaFin)){ 
            $data['ventas'] = $ventaModel
                ->where('fecha >=', $queryFechaInicio)
                ->where('fecha <', $fechaFinMasUno)
                ->orderBy('fecha', 'ASC')
                ->findAll();
        } else {
            $session->setFlashdata('msgFechasIncorrectasDeVentas', 'Las fechas ingresadas no han generado resultados');
            $data['ventas'] = [];
        }

        $session->setFlashdata('fechaInicioQueryValor', $queryFechaInicio);
        $session->setFlashdata('fechaFinQueryValor', $queryFechaFin);

        $data['titulo'] = "Dashboard | Lista de Ventas";
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('back/admin/listaVentas', $data);
        echo view('plantillas/footer');
    }

    public function indexDesactivadas(){
        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->getUsuarioAll();
        $ventasCabeceraModel = new VentasCabecera_model();
        $data['ventas'] = $ventasCabeceraModel->getVentasCabeceraAll();

        $data['titulo'] = "Dashboard | Lista de Ventas";
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('back/admin/listaVentasDesactivadas', $data);
        echo view('plantillas/footer');
    }

    public function buscadorVentasDesactivados(){
        $session = session();
        $queryFechaInicioDesactivado = $this->request->getVar('fechaInicioDesactivadoQuery');
        $queryFechaFinDesactivado = $this->request->getVar('fechaFinDesactivadoQuery'); 
        $usuarioModel = new Usuarios_model();
        $data['usuarios'] = $usuarioModel->getUsuarioAll();
        $ventaModel = new VentasCabecera_model();
        $fechaFinMasUno = date('Y-m-d', strtotime($queryFechaFinDesactivado . ' +1 day'));

        if($queryFechaInicioDesactivado && $queryFechaFinDesactivado && ($queryFechaInicioDesactivado <= $queryFechaFinDesactivado)){ 
            $data['ventas'] = $ventaModel
                ->where('fecha >=', $queryFechaInicioDesactivado)
                ->where('fecha <', $fechaFinMasUno)
                ->orderBy('fecha', 'ASC')
                ->findAll();
        } else {
            $session->setFlashdata('msgFechasIncorrectasDeVentasDesactivadas', 'Las fechas ingresadas no han generado resultados');
            $data['ventas'] = [];
        }

        $session->setFlashdata('fechaInicioDesactivadoQueryValor', $queryFechaInicioDesactivado);
        $session->setFlashdata('fechaFinDesactivadoQueryValor', $queryFechaFinDesactivado);
        $data['titulo'] = "Dashboard | Lista de Ventas";
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('back/admin/listaVentasDesactivadas', $data);
        echo view('plantillas/footer');
    }

    public function indexDetalleCompra($ventaIdCliente){
        $ventasCabeceraModel = new VentasCabecera_model();
        $ventaGeneral = $ventasCabeceraModel->find($ventaIdCliente);
        $data['venta_general'] = $ventaGeneral;
        $usuarioModel = new Usuarios_model();
        $data['usuario'] = $usuarioModel->find($ventaGeneral['usuario_id']);
        $detalleVentasModel = new VentasDetalle_model();
        $data['detalles'] = $detalleVentasModel->getDetalles($ventaIdCliente);
        $productoModel = new Producto_model();
        $data['productos'] = $productoModel->getProductoAll();

        $dato['titulo'] = "Dashboard | Detalles";
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/detallesVentas', $data);
        echo view('plantillas/footer');
    }
}