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

    public function editbooks($id){
        $data = books::find($id);
        //dd($data);
        $categoriesdata = categories::all();
        return view("editbooks", compact("data", "categoriesdata"));
    }

    public function updatebooks(Request $request, $id){
        //dd($request->all());
        $data = books::find($id);
        $data->update($request->all());
        return redirect()->route("books")->with('success','books updated successfully');
    }

    public function deletebooks($id){
        $data = books::find($id);
        $data->delete();
        return redirect()->route("books")->with('success','books deleted successfully');
    }
}
