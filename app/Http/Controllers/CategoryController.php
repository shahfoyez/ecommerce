<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories=Category::all();
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
        // return $request->image->extension();
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        $name = $request->name;
        $slug = $request->slug;
        $image = $request->image;

        //Query Builder
        /*DB::table('services')->insert([
            'title' => $title,
            'decription' => $description
        ]);*/

        //Eloquent
        $category = new Category();
        $category->name = $name;
        $category->slug = $slug;
        $category->userID = 1;


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

        return redirect()->to('admin/category/category')->with('message','Action Successfull!');
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
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
