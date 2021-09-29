<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::get();  //Relation is eager loaded
        return view('admin.product.product', [
            'products'=> $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'subCategories'=>SubCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes=$request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'spec' => 'required',
            'desc' => 'required',
            'bidable' => 'required',
            'status' => 'required',
            'category' => 'required',
            'subCategory' => 'required'
        ]);

        //Eloquent
        $product = new Product();
        $product->name =  $request->name;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->specification = $request->spec;
        $product->description = $request->desc;
        $product->isBidable = $request->bidable;
        $product->bidStatus = $request->status;
        $product->categoryID = $request->category;
        $product->subCategoryID=$request->subCategory;
        $product->userId= '1';

        if ($request->has('image')) {
            $imageName= 'IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $product->image= $imageName;
            $request->image->move(public_path('uploads/products'),$imageName);
        }else{
            $product->image='default.jpg';
        }
        $product->save();

        return redirect()->to('admin/product/product')->with('message', 'Product Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('admin.product.productEdit', [
            'product'=> $product,
            // 'categories'=> Category::all(),
            // 'subCategories'=> SubCategory::all()
            //Use if relationships is not eager loaded by default on the model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes=$request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'spec' => 'required',
            'desc' => 'required',
            'bidable' => 'required',
            'status' => 'required',
            'category' => 'required',
            'subCategory' => 'required'
        ]);

        $product = Product::findOrFail($request->id);
        $product->name =  $request->name;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->specification = $request->spec;
        $product->description = $request->desc;
        $product->isBidable = $request->bidable;
        $product->bidStatus = $request->status;
        $product->categoryID = $request->category;
        $product->subCategoryID=$request->subCategory;
        $product->userId= '1';

        if ($request->has('image')) {
            $imageName='IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $product->image= $imageName;
            $request->image->move(public_path('uploads/products'),$imageName);
        }else{
            $product->image='default.jpg';
        }
        $product->save();

        return redirect()->to('admin/product/product')->with('message', 'Product Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path= public_path('uploads/products/'.$product->image);
        if(file_exists($path)){
            unlink($path);
        }
        $product->delete();
        return redirect('admin/product/product')->with('message', 'Product deleted successfully.');
    }
}
