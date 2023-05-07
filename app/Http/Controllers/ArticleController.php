<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return "Articles List from Controller";
    }

    public function detail($id){
        return "Articles Detail-$id from Controller";
    }
}