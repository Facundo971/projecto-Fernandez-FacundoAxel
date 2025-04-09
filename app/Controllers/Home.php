<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('productos/index');
    }

    public function productos(){
        return view('productos/producto');
    }

    public function ayuda(){
        return view('productos/ayuda');
    }

    public function carrito(){
        return view('productos/carrito');
    }

    public function show(){
        return view('productos/show');
    }
}
