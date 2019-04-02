<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    // vista de nuestro formulario
    public function index(){

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {

    }
}