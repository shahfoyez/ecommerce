<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories=SubCategory::get();
        return view('admin/subCategory/subCategory', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/subCategory/create');
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
            'subCategory'=>'required'
        ]);

        $name = $request->name;
        $slug = $request->slug;
        $image = $request->image;
        $catId=$request->subCategory;

        //Eloquent
        $subCategory = new SubCategory();
        $subCategory->name = $name;
        $subCategory->slug = $slug;
        $subCategory->categoryID = $catId;


        if ($request->has('image')) {
            $extension = $image->extension();
            $imageName = 'IMG_'.md5(date('d-m-Y H:i:s'));
            $imageName = $imageName.'.'.$extension;

            $subCategory->image = $imageName;

            $path = public_path('uploads/subCategories');

            $image->move($path,$imageName);
        }else{
            $subCategory->image='default.jpg';
        }
        $subCategory->save();

        return redirect()->to('admin/subCategory/subCategory')->with('message','Action Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
