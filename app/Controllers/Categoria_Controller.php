<?php
namespace App\Controllers;
use CodeIgniter\Controller; 
use App\Models\Producto_model;
use App\Models\Categoria_model;
use App\models\Usuarios_model;

class Categoria_Controller extends Controller{
    public function __construct(){
        helper(['url', 'form']);
        $session = session();
    }

    public function index(){
        $categoriaModel = new Categoria_model();

        $data['categorias'] = $categoriaModel->getCategoriaAll();

        $dato['titulo'] = 'NetShop | Categorias';
        echo view('plantillas/header', $dato);
        echo view('plantillas/nav');
        echo view('plantillas/altaDeCategorias', $data);
        echo view('plantillas/footer');
    }

    public function formValidation(){
        $input = $this->validate([
            // 'categoria' => 'required|trim|alpha_space|min_length[2]|max_length[50]'
            'categoria' => 'required|trim|regex_match[/^([\p{L}\s])+$/u]|min_length[2]|max_length[50]'
        ]);

        $formModel = new Categoria_model();

        if(!$input){
            $data['titulo'] = 'NetShop | Alta de Categorias';
            echo view('plantillas/header', $data);
            echo view('plantillas/nav');
            echo view('plantillas/altaDeCategorias', ['validation' => $this->validator]);
            echo view('plantillas/footer');

        } else{
            $formModel->save([
                // Guardamos usando los nombres correctos definidos en la base de datos/modelo
                'descripcion' => $this->request->getVar('categoria')
            ]);

            session()->setFlashdata('success', 'Categoria Registrada con Exito');
            return redirect()->to('/altaDeCategorias');
        }
    }
}