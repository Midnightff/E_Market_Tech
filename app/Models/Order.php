<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'idOrder';
    protected $fillable = ['date', 'total', 'idUser', 'idStatus', 'idPaymentMethod', 'payment_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'idPaymentMethod');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'idOrder');
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class, 'idOrder');
    }
}
