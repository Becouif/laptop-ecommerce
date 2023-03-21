<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    
    public function index(){
        $products = Product::latest()->limit(9)->get();
        
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
        $categories = Category::get();
        dd($randomActiveProducts);
        return view('product',compact('products','categories',));
    }

    public function show($id){
        $product = Product::find($id);
        return view('show',compact('product'));
    }
}
