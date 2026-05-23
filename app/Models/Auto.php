<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Auto extends Model
{
    protected $table = 'autok';

    protected $fillable = [
        'marka',
        'modell',
        'evjarat',
        'kilometerora',
        'ajtok_szama',
        'uzemanyag',
        'teljesitmeny',
        'kivitel',
        'allapot',
        'szemelyek_szama',
        'szin',
        'sebessegvalto',
        'hengerurtartalom',
        'raktaron',
        'ar',
        'kep',
        'kep2',
        'kiemelt',
    ];

    const UPDATED_AT = null;

    /*
    |--------------------------------------------------------------------------
    | KAPCSOLATOK
    |--------------------------------------------------------------------------
    */

    // Egy autóhoz több komment tartozik
    public function comments()
    {
        return $this->hasMany(Comment::class, 'auto_id', 'id');
    }
}