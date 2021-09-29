<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::with(['user','subCategory'])->get();
        return view('admin.category.category', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image'=> 'mimes:jpg,png,jpeg|max:5048'
        ]);

        $name = $request->name;
        $slug = $request->slug;
        $image = $request->image;

        $user = User::first();
        $userId = $user ? $user->id : 1;
        //Eloquent
        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;
        $category->userID = $userId;

        if ($request->has('image')) {
            $extension = $image->extension();
            $imageName = 'IMG_'.md5(date('d-m-Y H:i:s'));
            $imageName = $imageName.'.'.$extension;

            $category->image = $imageName;

            $path = public_path('uploads/categories');

            $image->move($path,$imageName);
        }else{
            $category->image='default.jpg';
        }
        $category->save();

        return redirect()->to('admin/category/category')->with('message','Category Added Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)   //what id Category $category
    {
        // $category=$category->find(request()->id); //when using binding(Category $category) without route matching
        //$category= Category::findORFail($id); //when using parameter variable
        return view('admin.category.categoryEdit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes= $request->validate([
            'name'=> 'required',
            'slug'=> 'required',
            'image'=> 'mimes:jpg,png,jpeg|max:5048'
        ]);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->has('image')) {
            $path= public_path('uploads/categories/'.$category->image);
            if(file_exists($path)){
                unlink($path);
            }
            $imageName='IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $category->image= $imageName;
            $request->image->move(public_path('uploads/categories'),$imageName);
        }
        $category->save();
        return redirect('admin/category/category')->with('message', 'Category Updated Successfully.'); // for session flash
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $path= public_path('uploads/categories/'.$category->image);
        if(file_exists($path)){
            unlink($path);
        }
        $category->delete();
        return redirect('admin/category/category')->with('message', 'Category deleted successfully.');
    }
}
