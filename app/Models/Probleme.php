<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{
    protected $fillable = [
        'nom',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
