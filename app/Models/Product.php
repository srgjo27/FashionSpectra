<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
