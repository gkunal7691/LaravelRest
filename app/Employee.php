<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['emp_name', 'salary', 'job_description'];

    public function employyes()
    {
        return $this->hasOne(Task::class);
    }
}
