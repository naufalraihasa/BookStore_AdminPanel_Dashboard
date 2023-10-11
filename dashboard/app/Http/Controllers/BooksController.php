<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\categories;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $data = books::all();
        return view("books", compact("data"));
    }

    public function addbooks(){
        $categoriesdata = categories::all();
        return view("addbooks", compact("categoriesdata"));
    }

    public function insertbooks(Request $request){
        // dd($request->all());
        books::create($request->all());
        return redirect()->route("books")->with('success','Category added successfully');
    }
}
