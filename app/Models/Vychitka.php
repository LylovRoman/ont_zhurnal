<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vychitka extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'uroki_prepod';
    public $timestamps = false;
}
