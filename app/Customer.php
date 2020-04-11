<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
