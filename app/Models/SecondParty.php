<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondParty extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "value",
        "status",
    ];
}
