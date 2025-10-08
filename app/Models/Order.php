<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'payment_method', 'products', 'total', 'status'];
    protected $casts = ['products' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
