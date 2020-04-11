<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['city', 'state'];

    // public function employee()
    // {
    //     return $this->belongsToMany(Employee::class);
    // }
}
