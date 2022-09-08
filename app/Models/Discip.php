<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discip extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'discip';
    public $timestamps = false;
    public function nagruzki()
    {
        return $this->hasMany(Nagruzka::class, 'predmet', 'kod');
    }
}
