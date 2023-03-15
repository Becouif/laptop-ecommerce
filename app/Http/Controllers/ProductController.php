<?php

namespace App\Http\Controllers;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required|min:3',
            'image'=>'required|mimes:jpeg,jpg,png',
            'price'=>'required|numeric',
            'additional_info'=>'required',
            'category'=>'required'
        ]);
        $image = $request->file('image')->store('public/product');
        Product::create([
            'name'=> $request->name,
            'description'=>$request->description,
            'image'=> $image,
            'price'=>$request->price,
            'additional_info'=> $request->additional_info,
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory
        ]);
        return redirect()->route('product.index')->with('message','Product sucessfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $image = $product->image;
        if($request->file('image')){
            $image = $request->file('image')->store('public/product');
            \Storage::delete($product->image);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->image = $image;
            $product->additional_info = $request->additional_info;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->save();

        } else {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->additional_info = $request->additional_info;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->subcategory_id = $request->subcategory;
            $product->save();
        }
       
        return redirect()->route('product.index')->with('message','Product successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $filename = $product->image;
        $product->delete();
        \Storage::delete($filename);
        return redirect()->route('product.index')->with('message','product successfully deleted');
    }

    // method for loading all subcategories 
    public function loadSubCategories(Request $request, string $id){
        $subcategory = Subcategory::where('category_id',$id)->pluck('name','id');
        // convert what is coming into json 
        return response()->json($subcategory);
    }
    public function allLoad($request,$id){

    }
}
