<?php
namespace App\Controllers;

use App\Models\Categoria_model;
use CodeIgniter\Controller; 
use App\Models\Producto_model;
use App\Models\Consulta_model;
use App\Models\Marca_model;

class Consulta_controller extends Controller{
    public function __construct(){
        helper(['url', 'form']);
        $session = session();
    }

    public function index(){
        $consultaModel = new Consulta_model();

        $data['consultas'] = $consultaModel->getConsultaAll();

        $dato['titulo'] = 'Dashboard | Lista de Consultas';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaConsultas', $data);
        echo view('plantillas/footer');
    }

    public function indexDesactivadas(){
        $consultaModel = new Consulta_model();

        $data['consultas'] = $consultaModel->getConsultaAll();

        $dato['titulo'] = 'Dashboard | Lista de Consultas Leídas';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('back/admin/listaConsultasDesactivados', $data);
        echo view('plantillas/footer');
    }

    public function marcarConsulta($id){
        $consultaModel = new Consulta_model();
        $data['consulta'] = $consultaModel->find($id);

        $data = ['leido' => 'SI'];
        $consultaModel->update($id, $data);

        session()->setFlashdata('msgExitoso', 'Consulta leída exitosamente');
        return redirect()->to('/mostrarListaConsultas');
    }

    public function eliminarConsulta($id){
        $consultaModel = new Consulta_model();
        $data['consulta'] = $consultaModel->find($id);

        $data = ['baja' => 'SI'];
        $consultaModel->update($id, $data);

        session()->setFlashdata('msgExitoso', 'Consulta eliminada exitosamente');
        return redirect()->to('/mostrarListaConsultas');
    }

    public function formValidation(){
        $session = session();
        $consultaNombre = $this->request->getVar('nombre');
        $consultaApellido = $this->request->getVar('apellido');
        $consultaDni = $this->request->getVar('dni');
        $consultaTelefono = $this->request->getVar('telefono');
        $consultaEmail = $this->request->getVar('email');
        $consultaHecha = $this->request->getVar('consulta');

        $input = $this->validate([
            'nombre' => 'required|trim|regex_match[/^([\p{L}\s])+$/u]|min_length[2]|max_length[50]',
            'apellido' => 'required|trim|regex_match[/^([\p{L}\s])+$/u]|min_length[2]|max_length[50]',
            'dni' => 'required|trim|max_length[8]|is_natural|',
            'telefono' => 'required|trim|max_length[10]|is_natural',
            'email' => 'required|trim|valid_email|max_length[320]',
            'consulta' => 'required|trim|min_length[2]|max_length[500]'
        ]);

        $formModel = new Consulta_model();

        if(!$input){
            $categoriaModel = new Categoria_model();
            $data['categorias'] = $categoriaModel->getCategoriaAll();
            $marcaModel = new Marca_model();
            $data['marcas'] = $marcaModel->getMarcaAll();

            $session->setFlashdata('consultaNombreValor', $consultaNombre);
            $session->setFlashdata('consultaApellidoValor', $consultaApellido);
            $session->setFlashdata('consultaDniValor', $consultaDni);
            $session->setFlashdata('consultaTelefonoValor', $consultaTelefono);
            $session->setFlashdata('consultaEmailValor', $consultaEmail);
            $session->setFlashdata('consultaHechaValor', $consultaHecha);

            $data['titulo'] = 'NetShop | Consulta';
            echo view('plantillas/header', $data);
            echo view('plantillas/nav', $data);
            echo view('plantillas/consultas', ['validation' => $this->validator]);
            echo view('plantillas/footer', $data);
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'dni' => $this->request->getVar('dni'),
                'telefono' => $this->request->getVar('telefono'),
                'email' => $this->request->getVar('email'),
                'consulta' => $this->request->getVar('consulta')
            ]);

            session()->setFlashdata('msgExitoso', 'Consulta enviada exitosamente');

            return redirect()->to('/consultas');
        }
    }

    public function limpiarDatos() {
        session()->remove(['consultaNombreValor', 'consultaApellidoValor', 'consultaDniValor', 'consultaTelefonoValor', 'consultaEmailValor', 'consultaHechaValor']);
        return redirect()->to('/consultas');
    }
}