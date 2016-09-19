<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'id',
        'site',
        'comment',
        'created_at',
        'updated_at',
    ];
}
