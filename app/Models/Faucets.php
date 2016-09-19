<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Captcha;
use App\Models\Script;
use Illuminate\Support\Facades\Cookie;

class Faucets extends Model
{
    protected $table = 'faucets';

    protected $fillable = [
        'id',
        'coins_id',
        'site',
        'refer',
        'script_id',
        'captcha_id',
        'wait',
        'period',
        'register',
        'browser',
        'rewards',
        'antibot',
        'created_at',
        'published',
        'paid',
        'published_at'
    ];

    protected $appends = array('captcha', 'script');

    public function coins()
    {
        return $this->belongsToMany('App\Models\Coins');
    }

    public function getCaptchaAttribute()
    {
        $captcha = Faucets::getCaptchaArr();
        return $captcha[$this->attributes['captcha_id']];
    }

    public function getScriptAttribute()
    {
        $captcha = Faucets::getScriptArr();
        return $captcha[$this->attributes['script_id']];
    }


    public function scopePublished($query)
    {
        return $query->where('published','=','1');
    }

    public function scopeNoPublished($query)
    {
        return $query->where('published','=','0');
    }

    public function scopePaid($query)
    {
        return $query->where('paid','=','1');
    }

    public function scopeNoPaid($query)
    {
        return $query->where('paid','=','0');
    }

    public function scopeSiteId($query,$id)
    {
        if(!$id) return $query;
        else return $query->where('id',$id);
    }

    public  function scopeNoCompleted($query,$id)
    {
        $completed = Wallet::getCompleted($id);
        if(!$completed) return $query;
        return $query->whereNotIn('id',$completed);
    }

    public function scopeScript($query, $script)
    {
        if(!is_numeric($script)) exit(view('errors.404'));
        if($script==0) return $query;
        else return $query->where('script_id',$script);
    }

    public function scopeCaptcha($query, $captcha)
    {
        if(!is_numeric($captcha)) exit(view('errors.404'));
        if($captcha==0) return $query;
        else return $query->where('captcha_id',$captcha);
    }

    public function scopePeriod($query, $period)
    {
        if(!is_numeric($period)) exit(view('errors.404'));
        if($period==0) return $query;
        else return $query->where('period','<',$period);
    }

    public function scopeAntibot($query, $antibot)
    {
        if(!is_numeric($antibot)) exit(view('errors.404'));
        if($antibot==0) return $query;
        else return $query->where('antibot','<',$antibot);
    }

    public function scopeWait($query, $wait)
    {
        if(!is_numeric($wait)) exit(view('errors.404'));
        if($wait==0) return $query;
        else return $query->where('wait','<',$wait);
    }

    public function scopeMyList($query, $faucets)
    {
        return $query->whereIn('id', $faucets);
    }

    public static function getWaitArr()
    {
        return [
            0 => 'with time',
            1 => 'without time',
            11 => ' < 10',
            21 => ' < 20',
            31 => ' < 30',
            41 => ' < 40'
        ];
    }

    public static function getAntibotArr()
    {
        return [
            0 => 'with antibot',
            1 => 'without antibot',
            3 => ' < 2',
            5 => ' < 4',
            8 => ' < 7',
        ];
    }

    public static function getPeriodArr()
    {
        return [
            0 => 'all period',
            61 => ' < 1h',
            121 => ' < 2h',
            361 => ' < 6h'
        ];
    }

    public static function getScriptArr()
    {
        return [
            0 => 'all-script',
            1 => 'FaucetBox',
            2 => 'Microwallet',
            3 => 'Paytoshi',
            4 => 'DirectPay',
            5 => 'Xapo'
        ];
    }

    public static function getCaptchaArr()
    {
        return [
            0 => 'all-captcha',
            1 => 'FunCaptcha',
            2 => 'ReCaptcha',
            3 => 'SolveMedia',
            4 => 'Reklamper',
            5 => 'AreYouAHuman',
            6 => 'Other'
        ];
    }

    public static function isOrderBy($order)
    {
        if($order == 'rewards' || $order == 'period' || $order == 'votes') return true;
        else return false;
    }

    public static function getOrderBy()
    {
        if(Faucets::isOrderBy(Cookie::get('orderBy'))) return Cookie::get('orderBy');
        else return 'rewards';
    }

    public static function isWaitFilter($wait)
    {
        if (in_array($wait,array_keys(Faucets::getWaitArr())) ) return true;
        else return false;
    }

    public static function isPeriodFilter($period)
    {
        if (in_array($period,array_keys(Faucets::getPeriodArr())) ) return true;
        else return false;
    }

    public static function isAntibotFilter($antibot)
    {
        if (in_array($antibot,array_keys(Faucets::getAntibotArr())) ) return true;
        else return false;
    }

}
