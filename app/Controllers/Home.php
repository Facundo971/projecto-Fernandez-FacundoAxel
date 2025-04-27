<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'NetShop | Principal';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/carrusel');
        echo view('plantillas/index');
        echo view('plantillas/footer');
    }

    public function productos(){
        $data['titulo'] = 'NetShop | Productos';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/productos');
        echo view('plantillas/footer');
    }

    public function ayuda(){
        $data['titulo'] = 'NetShop | Ayuda';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/ayuda');
        echo view('plantillas/footer');
    }

    public function carrito(){
        $data['titulo'] = 'NetShop | Carrito';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/carrito');
        echo view('plantillas/footer');
    }

    public function contacto(){
        $data['titulo'] = 'NetShop | Contacto';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/contacto');
        echo view('plantillas/footer');
    }

    public function consultas(){
        $data['titulo'] = 'NetShop | Consultas';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/consultas');
        echo view('plantillas/footer');
    }

    public function inicioSesion(){
        $data['titulo'] = 'NetShop | Inicio de Sesion';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/inicioSesion');
        echo view('plantillas/footer');
    }

    public function quienesSomos(){
        $data['titulo'] = 'NetShop | Quienes Somos';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/quienesSomos');
        echo view('plantillas/footer');
    }

    public function comercializacion(){
        $data['titulo'] = 'NetShop | Comercializacion';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/comercializacion');
        echo view('plantillas/footer');
    }

    public function terminosUsos(){
        $data['titulo'] = 'NetShop | Terminos y Uso';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('plantillas/terminosUsos');
        echo view('plantillas/footer');
    }
}
