<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Test extends Model
{
    protected $fillable = [
        'nom',
        'body',
        'est_approuve',
        'user_id',
        'probleme_id',
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

    public function setNomAttribute($value)
    {
        $this->attributes['nom'] = Str::slug($value);
    }

    public static function stats()
    {
        return [
            'approuve' => static::where('est_approuve', true)->count(),
            'pending' => static::where('est_approuve', false)->count(),
        ];
    }
}
