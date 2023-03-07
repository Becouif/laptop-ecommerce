<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::get();

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories',
            'description',
            'image'=>'required|mimes:png,jpeg,jpg'
        ]);
        // access the image and make a public/files folder to store it 
        $image = $request->file('image')->store('public/files');
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'image'=>$image
        ]);
        return redirect()->back()->with('message','Category created successfully');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $image = $category->image ;
        if($request->file('image')){
            $image = $request->file('image')->store('public/files');
            \Storage::delete($category->image);
        }
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $image;
        $category->save();
        return redirect()->route('category.index')->with('message','Category successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        // to delte the image too 
        $filename = $category->image;
        $category->delete();
        \Storage::delete($filename);
        return redirect()->route('category.index')->with('message','Category successfully deleted');
    }
}
