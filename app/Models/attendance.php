<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = ['employee_id', 'date', 'in_time', 'out_time'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
