<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DisplayController extends Controller
{
    public function index(){
        return view('index');
    }
    public function invoice(){
        $products = Product::all();
        return view('invoice',compact('products'));
    }

}
