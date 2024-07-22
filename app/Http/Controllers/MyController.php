<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function myHome()
    {
        $products = Product::orderBy('created_at')->take(8)->get();

        return view('myHome',[
            'products' => $products
        ]);
    }

}
