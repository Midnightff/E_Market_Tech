<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $primaryKey = 'idShipment';
    protected $fillable = ['idOrder', 'shipment_date', 'estimated_delivery_date', 'idStatus', 'delivery_address'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'idOrder');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus');
    }
}
