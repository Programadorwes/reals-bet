<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        "name",
        "cpf",
        "birthdate",
        "email",
        "phone",
        "address",
        "city",
        "state"
    ];
}
