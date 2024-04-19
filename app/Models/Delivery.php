<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;
use App\Models\Letter;
use App\Models\FinancialRequest;
use App\Models\Payment;

class Delivery extends Model
{
    use HasFactory;


    protected $fillable = [

        "fullName",
        "gender" ,
        "phone",
        "phoneTwo",
        "email",
        "address",
        "district",
        "city",
        "national_id" ,
        "dateOfBirth",
        "commission",
    ];



        public function appointments()
        {
            return $this->hasMany(Appointment::class, 'client_id', 'id');
        }


        public function letters()
        {
            return $this->hasMany(Letter::class, 'client_id', 'id');
        }

        public function financial_requests()
        {
            return $this->hasMany(FinancialRequest::class, 'client_id', 'id');
        }

        public function payments()
        {
            return $this->hasMany(Payment::class, 'client_id', 'id');
        }

}
