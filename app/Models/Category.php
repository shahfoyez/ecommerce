<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    // protected $with=['user'];
    public function user(){
        return $this->belongsTo(User::class,'userID' );
    }
    public function subCategory(){
        return $this->hasMany(SubCategory::class,'categoryID');
    }
    public function product(){
        return $this->hasMany(Product::class,'categoryID');
    }

}
