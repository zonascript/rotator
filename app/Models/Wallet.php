<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';

    protected $fillable = [
        'id',
        'type',
        'value',
        'completed',
        'refer'
    ];

    public function favorite()
    {
        return $this->hasOne('App\Models\Favorite','wallet_id','id');
    }

    public static function completedFilter($id)
    {
        $wallet = Wallet::findOrFail($id);
        $data_array = explode(',', $wallet['completed']);
        if(empty($wallet['completed']))  return true;
        $str = '';
        foreach ($data_array as $data_array) {
            $tmp = explode('|', $data_array);
            if (Carbon::now() < $tmp[1]) $str .= $data_array.',';
        }
        $str = (!empty($str)) ? substr($str, 0, -1) : $str;
        $wallet['completed'] = $str;
        $wallet->save();
        return true;
    }

    public static function traceCompleted($id)
    {
        $wallet = Wallet::find($id);
        $data_array = explode(',', $wallet['completed']);
        if(empty($wallet['completed']))  return '';
        $str = '';
        foreach ($data_array as $data_array) {
            $tmp = explode('|', $data_array);
            if (Carbon::now() < $tmp[1])
            {
                $lastTime = Carbon::parse($tmp[1])->diffInMinutes(Carbon::now());
                $str .= $tmp[0].'|'.$lastTime.',';
            }
        }
        $str = (!empty($str)) ? substr($str, 0, -1) : $str;
        return $str;
    }

    public static function getCompleted($id)
    {
        $wallet = Wallet::findOrFail($id);
        if(empty($wallet['completed'])) return false;
        $wallet['completed'] = explode(',', $wallet['completed']);
        $result = array();
        foreach ($wallet['completed'] as $data) {
            $tmp = explode('|', $data);
            array_push($result,$tmp[0]);
        }
        return $result;
    }

    public static function getRefAddress($walletId)
    {
        $wallet = Wallet::find($walletId);
        if( empty($wallet['refer']) || $wallet['refer'] == null ) return false;
        $user = User::find( $wallet['refer'] );
        $refAddress = $user[ 'ref_'.$wallet['type'] ];
        return ( empty($refAddress) || $refAddress==null ) ? false : $refAddress;
    }

    public static function getRefCount($user_id)
    {
        return Wallet::where('refer',$user_id)->count();
    }

    public static function getStrWithout($walletId, $faucetId)
    {
        $completed = Wallet::CompletedToArray($walletId);
        return Wallet::cmArrToStr($completed,$faucetId);
    }

    private static function CompletedToArray($id)
    {
        $wallet = Wallet::findOrFail($id);
        if(empty($wallet['completed'])) return false;
        $wallet['completed'] = explode(',', $wallet['completed']);
        $result = array();
        foreach ($wallet['completed'] as $data) {
            $tmp = explode('|', $data);
            array_push($result,[0 => $tmp[0], 1 => $tmp[1] ]);
        }
        return $result;
    }

    private static function cmArrToStr($arr,$withoutId=null)
    {
        $str ='';
        foreach ($arr as $arr)
        {
            if( $withoutId != $arr[0])
                $str .= $arr[0].'|'.$arr[1].',';
        }
        return (!empty($str)) ? substr($str, 0, -1) : $str;
    }

}
