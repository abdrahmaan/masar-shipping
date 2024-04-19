<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penal extends Model
{
    use HasFactory;

    protected $fillable = [
        "contract_type",
        "penal",
        "status",
    ];
}
