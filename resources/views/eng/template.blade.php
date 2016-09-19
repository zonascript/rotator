<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">

    <title> @yield('title') </title>

 {!! Html::script('js/lib/jquery.js') !!}
 {!! Html::script('js/lib/bootstrap.js') !!}
 {!! Html::style('css/lib/bootstrap.css') !!}
 <!-- {!! Html::script('js/lib/bootbox.min.js') !!} -->

 {!! Html::style('css/faucets.css') !!}
 {!! Html::script('js/main.js') !!}

  @yield('link')

  <meta name="keywords" content="@yield('keywords','rotator,bitcoin,litecoin,dogecoin,primecoin,peercoin,dash,btc,ltc,dxg,faucet,satoshi,referral,crypto,wallet')">
  <meta name="description" content="@yield('description','Faucet rotator - bitcoin, litecoin, dogecoin, primecoin, peercoin, dash. Large list of faucets. Free mining satoshi. Referral system 100%')">

  </head>
  <body>
   @include('components.navbar')

   @include('components.message')

    <div id="content">
        @yield('content')
    </div>

    @include('components.footer')

  </body>
</html>