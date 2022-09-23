<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nagruzka extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'nagruzka';
    public $timestamps = false;

    protected $appends = ['discipName'];
    public function getDiscipNameAttribute() {
        return $this->discip->name;
    }

    public function discip()
    {
        return $this->belongsTo(Discip::class, 'predmet', 'kod');
    }
}
