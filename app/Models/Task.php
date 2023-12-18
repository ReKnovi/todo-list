<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',  
        'status',
        'start_date',
        'postponed_date'
    ];
}
