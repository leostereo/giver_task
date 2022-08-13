<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'email',
        'gender',
        'email',
        'ip_address',
        'company',
        'city',
        'title',
        'website'
    ];
}
