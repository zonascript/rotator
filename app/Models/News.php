<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'id',
        'title',
        'title_ru',
        'text',
        'text_ru',
        'published_at',
        'created_at',
        'updated_at'
    ];

    /*
    public function getCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->attributes['published_at'])->diffForHumans();
    }
    */

    public function scopePublished($query)
    {
        return $query->where('published_at','<',Carbon::now());
    }
}
