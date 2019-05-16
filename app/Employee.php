<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Employee model

    /**
     * Table name.
     * @var string
     */
    protected $table = 'employees';

    /**
     * Columns used in operation.
     * @var array
     */
    protected $fillable = ['employee_id', 'department_id', 'name', 'date_of_joining', 'gender', 'address', 'salary'];
}
