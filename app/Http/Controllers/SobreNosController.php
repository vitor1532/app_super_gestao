<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{

    public function __construct() {
        
    }

    public function sobreNos() {
        return view('site.sobreNos');
    }
}
