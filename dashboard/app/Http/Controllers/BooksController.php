<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\store;
use App\Models\categories;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = books::where('book_name', 'LIKE', '%' .$request->search. '%')->paginate(10);
        }else{
            $data = books::paginate(10);
        }

        // $data = books::all();
        // $data = books::Paginate(10); // ini buat di tampilkan di master ( master bisa filter data)
        return view("books.books", compact("data"));
    }

    public function booksA(Request $request){
        if($request->has("search")){
            $data = books::where('store_id', 1)
             ->where('book_name', 'LIKE', '%' . $request->search . '%')
             ->paginate(10);
        }else{
            $data = books::where('store_id', '1')->paginate(10);
        }

        // $data = books::all();
        // $data = books::where('store_id', '1')->paginate(10);// ini buat di tampilkan di master ( master bisa filter data)
        return view("books.booksA", compact("data"));
    }

    public function booksB(Request $request){
        if($request->has("search")) {
            $data = books::where('store_id', 2)
             ->where('book_name', 'LIKE', '%' . $request->search . '%')
             ->paginate(10);
        } else {
            $data = books::where('store_id', '2')->paginate(10);
        }


        // $data = books::all();
        // $data = books::where('store_id', '2')->paginate(10);; // ini buat di tampilkan di master ( master bisa filter data)
        return view("books.booksB", compact("data"));
    }

    public function addbooks(){
        $categoriesdata = categories::all();
        $storesdata = store::all();
        //dd($storesdata);
        return view("books.addbooks", compact("categoriesdata", "storesdata"));
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
        $storesdata = store::all();
        return view("books.editbooks", compact("data", "categoriesdata", "storesdata"));
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
