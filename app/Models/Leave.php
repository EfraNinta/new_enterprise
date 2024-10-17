<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',   
        'start_of_date', 
        'end_of_date',   
        'status',
    ];

     // Menambahkan casting untuk kolom tanggal
     protected $casts = [
        'start_of_date' => 'datetime',
        'end_of_date'   => 'datetime',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id');
    }
}
