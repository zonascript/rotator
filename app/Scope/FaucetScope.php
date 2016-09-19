<?php
namespace App\Scope;

use App\Models\Captcha;
use App\Models\Script;
use App\Models\Period;
use App\Models\Wallet;
use Illuminate\Support\Facades\Response;

trait FaucetScope
{
    public function scopePublished($query)
    {
        return $query->where('published','=','1');
    }

    public function scopeNoPublished($query)
    {
        return $query->where('published','=','0');
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
        if($script != 'all-script')
        {
            if(Script::where('value','=',$script)->count() == 1)
                return $query->where('script','=',$script);
            else exit('ooo no!');
        }
        return $query;
    }

    public function scopeCaptcha($query, $captcha)
    {
        if($captcha != 'all-captcha')
        {
            if(Captcha::where('value','=',$captcha)->count() == 1)
                return $query->where('captcha','=',$captcha);
            else exit('ooo no!');
        }
        return $query;
    }

    public function scopePeriod($query, $period)
    {
        if($period != 'all-period')
        {
            if(Period::where('value','=',$period)->count() == 1)
            {
                $per = explode('-',$period);
                return $query->where('period','>',$per[0])->where('period','<',$per[1]);
            }
            else exit('ooo no!');
        }
        return $query;
    }

}