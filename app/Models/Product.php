<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Product';
    protected $fillable = ['name', 'description', 'price', 'stock', 'size', 'color', 'category_id'];

    public $timestamps = false;

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
