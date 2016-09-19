<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class Vote extends Model
{
    protected $table = 'votes';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','faucet_id', 'ip', 'vote' ];


}
