<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bankrupt extends Model
{
    protected $table = 'bankrupt';

    protected $fillable = [
        'id',
        'faucet_id',
        'ip',
        'created_at',
        'updated_at'
    ];
}
