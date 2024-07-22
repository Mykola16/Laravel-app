<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($cat_id,$product_id)
    {
        $item = Product::where('id',$product_id)->first();

//        if (!$item) {
//            abort(404);
//        }

        return view('product.show',[
            'item' => $item
        ]);
    }

    public function showCategory($cat_alias){
        $cat = Category::where('alias',$cat_alias)->first();

//        if (!$cat) {
//            abort(404);
//        }
//
        return view('categories.index',[
            'cat' => $cat,

        ]);
    }
}
