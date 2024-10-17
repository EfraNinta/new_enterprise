<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = [
        'user_id',
        'attendance_date',
        'status',
    ];

    // Menambahkan casting untuk kolom tanggal
    protected $casts = [
        'attendance_date' => 'datetime', // Mengonversi attendance_date ke objek Carbon
    ];

    /**
     * Get the employee that owns the attendance.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
