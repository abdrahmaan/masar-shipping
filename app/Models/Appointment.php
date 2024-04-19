<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "fullName" ,
        "phone",
        "phoneTwo",
        "address",
        "district",
        "city",
        "dateOfAppointment",
        "dayOfAppointment",
        "timeOfAppointment",
        "reason",
        "status",
        "op",
        "op_description",
    ];
}
