<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'idOrderDetail';
    protected $fillable = ['idOrder', 'idProduct', 'quantity', 'unit_price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'idOrder');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct');
    }
}
