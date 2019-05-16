<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // Department model

    /**
     * Table name.
     * @var string
     */
    protected $table = 'departments';

    /**
     * Columns use in operation.
     * @var array
     */
    protected $fillable = ['department_id', 'name'];
}
