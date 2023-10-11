<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $data = books::all();
        return view("books", compact("data"));
    }
}
