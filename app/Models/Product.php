<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProduct';
    protected $fillable = ['name', 'description', 'image', 'price', 'stock', 'idCategory', 'idBrand', 'idSupplier', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategory');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'idBrand');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'idSupplier');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'idProduct');
    }

    public function getImageUrlAttribute()
    {
        return $this->image
        ? asset('storage/' . $this->image)
        : asset('storage/images/null.png');
    }
}
