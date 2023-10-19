<?php

namespace App\Http\Controllers;

use App\Models\store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    //

    public function index(){
        $data = store::all();
        return view("categories", compact("data"));
    }
}
