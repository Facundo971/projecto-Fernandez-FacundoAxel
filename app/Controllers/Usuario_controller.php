<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller{
    public function index(){
        helper(['form', 'url']);
    }

    public function formValidation(){
        $input = $this->validate([
            // 'nombre' => 'required|trim|alpha_space|min_length[2]|max_length[50]',
            // 'apellido' => 'required|trim|alpha_space|min_length[2]|max_length[50]',
            'nombre' => 'required|trim|regex_match[/^([\p{L}\s])+$/u]|min_length[2]|max_length[50]',
            'apellido' => 'required|trim|regex_match[/^([\p{L}\s])+$/u]|min_length[2]|max_length[50]',
            'usuario' => 'required|trim|min_length[4]|max_length[20]',//alpha_numeric_dash|is_unique[usuarios.usuario]
            'email' => 'required|trim|valid_email', //|is_unique[usuarios.email]
            'contraseña' => 'required|trim|min_length[8]|max_length[255]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/]'
        ]);

        $formModel = new Usuarios_model();

        if(!$input){
            $data['titulo'] = 'NetShop | Registro';
            echo view('plantillas/header', $data);
            echo view('plantillas/nav');
            echo view('back/usuario/registrarse', ['validation' => $this->validator]);
            echo view('plantillas/footer');

        } else{
            $formModel->save([
                // Guardamos usando los nombres correctos definidos en la base de datos/modelo
                'nombre' => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario' => $this->request->getVar('usuario'),
                'email' => $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('contraseña'), PASSWORD_DEFAULT)
            ]);

            session()->setFlashdata('success', 'Usuario Registrado con Exito');
            // return $this->response->redirect('/registrarse');
            return redirect()->to('/registrarse');
        }
    }
}