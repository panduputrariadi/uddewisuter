<?php

namespace App\Models;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'namaProduk',
        'jenisProduk',
        'categoriesId'
    ];

    public function photo()
    {
        return $this->hasMany(Photo::class, 'productId', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categoriesId', 'id');
    }
}
