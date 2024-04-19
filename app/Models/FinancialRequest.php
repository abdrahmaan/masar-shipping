<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id" ,
        "fullName" ,
        "phone" ,
        "contract_id" ,
        "amount" ,
        "amount_letters" ,
        "dateOfPay" ,
    ];
}
