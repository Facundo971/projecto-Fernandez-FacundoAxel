<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Login_controller extends Controller{
    public function index(){
        helper(['form', 'url']);
    }

    public function auth(){
        $session = session();
        $model = new Usuarios_model();

        $correo = $this->request->getVar('email');
        $contraseña = $this->request->getVar('contraseña');

        // Se consulta la base de datos para encontrar el usuario con el email proporcionado
        $data = $model->where('email', $correo)->first();

        if($data){
            $pass = $data['pass'];
            $ba = $data['baja'];

            // Se verifica si el usuario está dado de baja.
            if($ba == 'SI'){
                $session->setFlashdata('msgUser', 'usuario dado de baja');
                return redirect()->to('/'); // Redirige a la página principal.
            }

            // Se verifica la contraseña utilizando password_verify.
            $verify_pass = password_verify($contraseña, $pass);
            if ($verify_pass) {
                // Se prepara la información a guardar en la sesión.
                $ses_data = [
                    'id_usuario'  => $data['id_usuario'],
                    'nombre'      => $data['nombre'],
                    'apellido'    => $data['apellido'],
                    'email'       => $data['email'],
                    'usuario'     => $data['usuario'],
                    'perfil_id'   => $data['perfil_id'],
                    'logged_in'   => TRUE
                ];
                // $session->setFlashdata('msgWelcome', 'Bienvenido!!'); // Se guarda un mensaje de bienvenida.
                $session->set($ses_data); // Se inician los datos de sesión.
                // Redirección condicional basada en el rol.
                if ($data['perfil_id'] == 1) { 
                    // Si el usuario es admin, se redirige a la vista administrativa.
                    return redirect()->to('/mostrarListaProductos');
                } elseif ($data['perfil_id'] == 2) {
                    // Si el usuario es cliente, se redirige a la vista principal.
                    return redirect()->to('/');
                } else {
                    // En caso de que el usuario tenga otro rol, se puede definir un comportamiento por defecto.
                    return redirect()->to('/inicioSesion');
                }
            } else {
                // En caso de que la contraseña no coincida:
                $session->setFlashdata('msgPassword', 'Contraseña Incorrecta');
                return redirect()->to('/inicioSesion'); // Se redirige nuevamente al login.
            }
        } else{
            // Si no se encuentra el usuario (o no se ha ingresado un email correcto)
            $session->setFlashdata('msgEmail', 'Correo Electronico incorrecto');
            return redirect()->to('/inicioSesion'); // Se redirige al formulario de login.
        }
    }

    public function logeout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}