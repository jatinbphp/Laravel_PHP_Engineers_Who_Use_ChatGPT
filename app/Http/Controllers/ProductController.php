<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index() {

        return view('products.list');
    }
    public function FetchProducts(Request $request) {
        $users = Product::select(['id', 'name', 'price', 'sku', 'description']);

        return DataTables::of($users)->make(true);
    }
}
