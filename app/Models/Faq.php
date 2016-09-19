<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    protected $fillable = [
        'id',
        'title',
        'title_ru',
        'text',
        'text_ru',
        'created_at',
        'updated_at'
    ];

}
