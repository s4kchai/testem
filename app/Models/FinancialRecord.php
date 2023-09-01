<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class FinancialRecord extends Model
{
    protected $fillable = [
        'prefix',
        'first_name',
        'last_name',
        'birthdate',
        'profile_image',
        'last_updated_at',
    ];
}

