<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index() {
         $products = Product::all();
        return view('search.index', compact('products'));
    }
    public function SearchProducts(Request $request) {
        $products = Product::where("name", "like", "%".$request->input('query')."%")->get();
        return view('search.productlist', compact('products'));
    }
}
