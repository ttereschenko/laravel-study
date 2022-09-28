<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_of_birth',
        'growth',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
