<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'nom',
        'body',
        'est_approuve',
        'user_id',
    ];

    protected $casts = [
        'est_approuve' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function probleme()
    {
        return $this->belongsTo(Probleme::class);
    }
}
