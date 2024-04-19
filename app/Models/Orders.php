<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id",
        "clientName",
        "phone",
        "phoneTwo",
        "address",
        "distinict",
        "city",
        "amount",
        "shipFee",
        "companyFee",
        "status",
        "delivery_id",
    ];
}
