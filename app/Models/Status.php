<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $primaryKey = 'idStatus';
    protected $fillable = ['name'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'idStatus');
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'idStatus');
    }
}
