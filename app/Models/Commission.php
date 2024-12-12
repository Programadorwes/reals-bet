<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        "affiliate_id",
        "value",
        "date"
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class, 'affiliate_id');
    }
}
