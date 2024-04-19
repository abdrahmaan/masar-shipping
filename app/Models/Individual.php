<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    protected $fillable = [
        "fullName" ,
        "gender" ,
        "phone" ,
        "phoneTwo" ,
        "address" ,
        "district" ,
        "city" ,
        "postalCode" ,
        "national_id" ,
        "dateOfBirth",
    ];
}
