<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Principal';
        echo view('plantillas/header', $data);
        echo view('plantillas/carrusel');
        echo view('plantillas/index');
        echo view('plantillas/footer');
    }

    public function productos(){
        $data['titulo'] = 'Productos';
        echo view('plantillas/header', $data);
        echo view('plantillas/productos');
        echo view('plantillas/footer');
    }

    public function ayuda(){
        $data['titulo'] = 'Ayuda';
        echo view('plantillas/header', $data);
        echo view('plantillas/ayuda');
        echo view('plantillas/footer');
    }

    public function carrito(){
        $data['titulo'] = 'Carrito';
        echo view('plantillas/header', $data);
        echo view('plantillas/carrito');
        echo view('plantillas/footer');
    }

    public function show(){
        $data['titulo'] = 'Show';
        echo view('plantillas/header', $data);
        echo view('plantillas/show');
        echo view('plantillas/footer');
    }

    public function consultas(){
        $data['titulo'] = 'Consultas';
        echo view('plantillas/header', $data);
        echo view('plantillas/consultas');
        echo view('plantillas/footer');
    }

    public function inicioSesion(){
        $data['titulo'] = 'Inicio de Sesion';
        echo view('plantillas/header', $data);
        echo view('plantillas/inicioSesion');
        echo view('plantillas/footer');
    }

    // public function comercializacion(){
    //     return view('productos/consultas');
    // }

    // public function terminoUso(){
    //     return view('productos/inicioSesion');
    // }
}
