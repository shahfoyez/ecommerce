<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $subCategories=SubCategory::with('category')->get();
        return view('admin/subCategory/subCategory', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin/subCategory/create', compact('categories'));
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

        //Eloquent
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->categoryID = $request->subCategory;


        if ($request->has('image')) {
            $imageName='IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $subCategory->image= $imageName;
            $request->image->move(public_path('uploads/subCategories'),$imageName);
        }else{
            $subCategory->image='default.jpg';
        }
        $subCategory->save();

        return redirect()->to('admin/subCategory/subCategory')->with('message', 'Sub Category Added successfully');
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
        $subCategory=$subCategory->load('category');  //Preload Category Object //Use Load When No Eager Load
        return view('admin.subCategory.subCategoryEdit', ['subCategory'=>$subCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes= $request->validate([
            'name'=> 'required',
            'slug'=> 'required',
            'image'=> 'mimes:jpg,png,jpeg|max:5048',
            'category' =>'required'
        ]);

        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->name = $request->name;
        $subCategory->slug = $request->slug;
        $subCategory->categoryID = $request->category;
        if ($request->has('image')) {
            $path= public_path('uploads/subCategories/'.$subCategory->image);
            if(file_exists($path)){
                unlink($path);
            }
            $imageName='IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $subCategory->image= $imageName;
            $request->image->move(public_path('uploads/subCategories'),$imageName);
        }
        $subCategory->save();
        return redirect('admin/subCategory/subCategory')->with('message', 'Category Updated Successfully.'); // for session flash
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $path= public_path('uploads/subCategories/'.$subCategory->image);
        if(file_exists($path)){
            unlink($path);
        }
        $subCategory->delete();
        return redirect('admin/subCategory/subCategory')->with('message', 'Sub Category deleted successfully.');
    }
}
