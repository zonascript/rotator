<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaucetRequest;

use App\Models\Captcha;
use App\Models\Faucets;
use App\Models\Script;
use App\Models\Period;
use App\Models\Wallet;

use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Request;
use Illuminate\Support\Facades\Cookie;

use App\Models\Coins;


class FaucetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($faucetName,$script=0,$captcha=0,$period=0,$antibot=0,$wait=0)
    {
        if (!Faucets::isWaitFilter($wait) || !Faucets::isPeriodFilter($period) || !Faucets::isAntibotFilter($antibot)) exit(view('errors.404'));
        $faucet =  Coins::findByName($faucetName)->faucets()
        ->published()
        ->script($script)
        ->captcha($captcha)
        ->period($period)
        ->antibot($antibot)
        ->wait($wait)
        ->paid()
        ->orderBy(Faucets::getOrderBy(),'DESC')
        ->get();
        $capital = 0;
        foreach($faucet as $f) $capital += $f['rewards'];
        $scriptArr = Faucets::getScriptArr();
        $captchaArr = Faucets::getCaptchaArr();
        $periodArr = Faucets::getPeriodArr();
        $antibotArr = Faucets::getAntibotArr();
        $waitArr = Faucets::getWaitArr();
        $completed = Wallet::traceCompleted(Cookie::get($faucetName.'-id'));
        //$favorite = Wallet::find(Cookie::get($faucetName.'-id'))->favorite()->first();
        $favFaucets = NULL;
        return view('faucets/list',compact(
            'faucet',
            'capital',
            'faucetName',
            'script',
            'captcha',
            'period',
            'antibot',
            'wait',
            'completed',
            'scriptArr',
            'captchaArr',
            'periodArr',
            'antibotArr',
            'waitArr',
            'favFaucets'
        ));
    }

    public function myList($faucetName)
    {
        $favorite = Wallet::find(Cookie::get($faucetName.'-id'))->favorite()->first();
        $favorite = explode(',',$favorite['faucets']);
        $faucet =  Coins::findByName($faucetName)->faucets()
            ->published()
            ->paid()
            ->myList($favorite)
            ->orderBy(Faucets::getOrderBy(),'DESC')
            ->get();
        $capital = 0;
        foreach($faucet as $f) $capital += $f['rewards'];
        $completed = Wallet::traceCompleted(Cookie::get($faucetName.'-id'));
        $favorite = Wallet::find(Cookie::get($faucetName.'-id'))->favorite()->first();
        $favFaucets = $favorite['faucets'];
        return view('faucets/favorite',compact(
            'faucet',
            'capital',
            'faucetName',
            'completed',
            'favFaucets'
        ));
    }

    public function filter(Request $request,$faucetName)
    {
        $request = $request::all();
        return redirect(url($faucetName.'/'.$request['script'].'/'.$request['captcha'].'/'.$request['period'].'/'.$request['antibot'].'/'.$request['wait']));
    }

    public function show($faucetName,$id)
    {
        $faucet =  Coins::findByName($faucetName)->faucets()
            ->find($id);
        return $faucet;
    }

    public function browser($faucetName,$script=0,$captcha=0,$period=0,$antibot=0,$wait=0,$siteId=false)
    {
        if (!Faucets::isWaitFilter($wait) || !Faucets::isPeriodFilter($period) || !Faucets::isAntibotFilter($antibot)) exit(view('errors.404'));
        Wallet::completedFilter(Cookie::get($faucetName.'-id'));
        $refAddress = Wallet::getRefAddress(Cookie::get($faucetName.'-id'));
        $faucet = Coins::findByName($faucetName)->faucets()
            ->published()
            ->script($script)
            ->captcha($captcha)
            ->period($period)
            ->antibot($antibot)
            ->wait($wait)
            ->paid()
            ->orderBy(Faucets::getOrderBy(),'DESC')
            ->noCompleted(Cookie::get($faucetName.'-id'))
            ->siteId($siteId)
            ->first();
        $address = ($refAddress) ? $refAddress : Coins::getAddress($faucetName);
        return  view('faucets/browser',compact('faucet','faucetName','script','captcha','period','antibot','wait','address'));
    }

    public function myBrowser($faucetName,$siteId=false)
    {
        Wallet::completedFilter(Cookie::get($faucetName.'-id'));
        $refAddress = Wallet::getRefAddress(Cookie::get($faucetName.'-id'));
        $script=0;$captcha=0;$period=0;$antibot=0;$wait=0;
        $faucet = Coins::findByName($faucetName)->faucets()
            ->published()
            ->paid()
            ->orderBy(Faucets::getOrderBy(),'DESC')
            ->noCompleted(Cookie::get($faucetName.'-id'))
            ->siteId($siteId)
            ->first();
        $address = ($refAddress) ? $refAddress : Coins::getAddress($faucetName);
        return  view('faucets/browser',compact('faucet','faucetName','script','captcha','period','antibot','wait','address'));
    }

    public function next(Request $request)
    {
        $request = Request::all();
        $wallet = Wallet::find($request['wallet_id']);
        if(!empty($wallet['completed']))  $wallet['completed'].= ',';
        $wallet['completed'] .= $request['faucet_id'].'|'.Carbon::now()->addMinutes($request['faucet_period']);
        $wallet->save();
        $url = url('browser/'.$request['faucetName'].'/'.$request['script'].'/'.$request['captcha'].'/'.$request['period'].'/'.$request['antibot'].'/'.$request['wait']);
        return redirect($url);
    }

    public function unsetOneTimer($faucetName,$faucetId)
    {
        $walletId = Cookie::get($faucetName.'-id');
        $str =  Wallet::getStrWithout($walletId,$faucetId);
        $wallet = Wallet::find($walletId);
        $wallet['completed'] = $str;
        if($wallet->save()) return 'OK';
    }

    public function changeOrderBy($order)
    {
        if( Faucets::isOrderBy($order) ) $cookie = Cookie::forever('orderBy',$order);
        else exit(view('errors.404'));
        return redirect()->back()->withCookie($cookie);
    }

    private function filterReferLink()
    {
        $faucets = Faucets::all();
        foreach($faucets as $faucet)
        {
            $f = Faucets::find($faucet['id']);
            $link = explode('=',$f['refer']);
            $f['refer'] = $link[0].'=';
            $f->save();
        }
    }

}
