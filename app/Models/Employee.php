<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'place_of_birth',
        'dob',
        'religion',
        'sex',
        'phone',
        'salary',
        'user_id',
        'department_id',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
