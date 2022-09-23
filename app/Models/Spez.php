<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spez extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'spez';
    public $timestamps = false;

    public function discips()
    {
        return $this->hasMany(Discip::class, 'spez', 'kod');
    }
}
