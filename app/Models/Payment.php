<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "clientName" ,
        "client_id" ,
        "contract_id" ,
        "paymentType" ,
        "transactionType" ,
        "amount" ,
        "description" ,
        "dateOfPay",
        "op" ,
    ];



}
