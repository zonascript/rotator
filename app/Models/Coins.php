<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    protected $table = 'coins';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'coin_name',
        'address'
    ];

    public function scopeFindByName($query,$coins_name)
    {
        $name = $query->where('coin_name', $coins_name)->first();
        if($name==false)  exit(view('errors.404'));
        else return $name;
    }

    public function faucets()
    {
        return $this->hasMany('App\Models\Faucets','coins_id');
    }

    public static function getIdByName($coin_name)
    {
        $coins = static::where('coin_name',$coin_name)->first();
        return $coins['id'];
    }

    public static function getAddress($coin_name)
    {
        $coins = static::where('coin_name',$coin_name)->first();
        return $coins['address'];
    }


}
