<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authentication;



class Manager extends Authentication
{
    use HasFactory;

    protected $gurd = 'manager';
}
