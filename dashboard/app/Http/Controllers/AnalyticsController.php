<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\analytics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index(Request $request)
    {
        $selectedStore = $request->input('store', 1); // Default to store_id 1 if no selection is made

        $totalbooks = books::count();

        $results = DB::select("SELECT COUNT(books.book_name) AS bookName, categories.category_name
            FROM books
            LEFT JOIN categories ON categories.id = books.category_id
            WHERE books.store_id = $selectedStore
            GROUP BY books.category_id, categories.category_name
        ");

        $data_books_categories_A = "";
        foreach ($results as $result) {
            $data_books_categories_A .= "['" . $result->category_name . "', " . $result->bookName . "],";
        }

        $pieChartData = $data_books_categories_A;

        return view("analytics.analytics", compact('totalbooks', 'pieChartData'));
    }


    public function analyticsA()
    {
        // $data = analytics::all(); // ini buat di tampilkan di master ( master bisa filter data)
        //$dataA (ditampilin di admin A)
        //$dataB (ditampilin di admin B)
        return view("analytics.analyticsA");
    }

    public function analyticsB()
    {
        // $data = analytics::all(); // ini buat di tampilkan di master ( master bisa filter data)
        //$dataA (ditampilin di admin A)
        //$dataB (ditampilin di admin B)
        return view("analytics.analyticsB");
    }
}
