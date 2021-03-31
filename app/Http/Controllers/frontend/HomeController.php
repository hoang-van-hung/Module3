<?php


namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $products = Product::all();
        return view('front-end.home', compact('products'));
    }
}
