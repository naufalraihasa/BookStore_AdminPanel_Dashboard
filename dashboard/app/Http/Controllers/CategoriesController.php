<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $data = categories::all();
        return view("categories.categories", compact("data"));
    }


    public function addcategories(){
        return view("categories.addcategories");
    }

    public function insertcategories(Request $request){
        // dd($request->all());
        categories::create($request->all());
        return redirect()->route("categories")->with('success','Category added successfully');
    }

    public function editcategories($id){
        $data = categories::find($id);
        //dd($data);
        return view("categories.editcategories", compact("data"));
    }

    public function updatecategories(Request $request, $id){
        //dd($request->all());
        $data = categories::find($id);
        $data->update($request->all());
        return redirect()->route("categories")->with('success','Category updated successfully');
    }

    public function deletecategories($id){
        $data = categories::find($id);
        $data->delete();
        return redirect()->route("categories")->with('success','Category deleted successfully');
    }
}
