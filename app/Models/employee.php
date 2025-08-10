<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = [
        'user_id',
        'employee_code',
        'name',
        'email',
        'phone',
        'designation',
        'department_id',
        'joining_date',
        'salary',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function payrolls()
    {
        return $this->hasMany(payroll::class);
    }

    public function documents()
    {
        return $this->hasMany(EmployeeDocument::class);
    }
}
