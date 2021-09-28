<?php

namespace App\Models;

use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'userID','id');
    }
    public function subCategory(){
        return $this->hasMany(SubCategory::class,'categoryID');
    }
}
