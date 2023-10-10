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

    public function addcategories(){
        return view("addcategories");
    }

    public function insertcategories(Request $request){
        // dd($request->all());
        categories::create($request->all());
        return redirect()->route("categories")->with('success','Category added successfully');
    }
}
