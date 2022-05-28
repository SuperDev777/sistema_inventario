<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //Este metodo permite traer las categorias
    public function index(){
        return Categoria::all();
    }
    
    public function store(){

    }
    public function update(){

    }
    public function delete(){
        
    }
}