<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $with=['category','subCategory', 'user'];
    public function category(){
        return $this->belongsTo(Category::class, 'categoryID');
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'subCategoryID');
    }
    public function user(){
        return $this->belongsTo(User::class, 'userID');
    }

}
