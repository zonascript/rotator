<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorite';

    public $timestamps = false;

    protected $fillable = [
        'wallet_id',
        'faucets'
    ];
}
