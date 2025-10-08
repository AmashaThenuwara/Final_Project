<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'size', 'category_id', 'image_url', 'stock'];
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
