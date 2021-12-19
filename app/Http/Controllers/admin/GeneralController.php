<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function index()
    {
        $categories=Category::with(['subCategory'])->get();
        // dd($categories->subCategory->all());
        return view('general.dashboard',[
            'categories' => $categories
        ]);
    }
    public function productByCategory(Category $category)
    {
        $categories=Category::with(['subCategory'])->get();
        $categoryID=$category->id;
        $products= Product::where('categoryID', $categoryID)->get();
        // dd($products);
        return view('general/productByCategory',[
            'products' => $products,
            'categories'=>$categories,
            'category' =>$category
        ]);
    }
    public function productBySubCategory(SubCategory $subCategory)
    {
        $categories=Category::with(['subCategory'])->get();
        $subCategoryID=$subCategory->id;
        $products= Product::where('subCategoryID', $subCategoryID)->get();
         
        return view('general/productBySubCategory',[
            'products' => $products,
            'categories'=>$categories,
            'subCategory' =>$subCategory
        ]);
    }
    public function productById(Product $product)
    {
        $product= Product::where('id', $product->id)->get();
        // dd($product);
        return view('general/productView',[
            'product' => $product
        ]);
    }
}
