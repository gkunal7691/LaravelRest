<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabs extends Model
{
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
