<?php

namespace App\Http\Controllers;

use App\Models\analytics;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(){
        // $data = analytics::all(); // ini buat di tampilkan di master ( master bisa filter data)
        //$dataA (ditampilin di admin A)
        //$dataB (ditampilin di admin B)
        return view("analytics.analytics");
    }

    public function analyticsA(){
        // $data = analytics::all(); // ini buat di tampilkan di master ( master bisa filter data)
        //$dataA (ditampilin di admin A)
        //$dataB (ditampilin di admin B)
        return view("analytics.analyticsA");
    }

    public function analyticsB(){
        // $data = analytics::all(); // ini buat di tampilkan di master ( master bisa filter data)
        //$dataA (ditampilin di admin A)
        //$dataB (ditampilin di admin B)
        return view("analytics.analyticsB");
    }
}
