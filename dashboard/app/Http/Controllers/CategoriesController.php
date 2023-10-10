<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $data = categories::all();
        return view("categories", compact("data"));
    }
}
