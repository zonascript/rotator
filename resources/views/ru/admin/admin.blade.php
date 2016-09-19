<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">

    <title> @yield('title') </title>

 {!! Html::script('js/lib/jquery.js') !!}
 {!! Html::script('js/lib/bootstrap.js') !!}
 {!! Html::style('css/lib/bootstrap.css') !!}
 <!-- {!! Html::script('js/lib/bootbox.min.js') !!} -->

 {!! Html::script('js/main.js') !!}
 {!! Html::style('css/faucets.css') !!}
 {!! Html::style('css/admin/admin.css') !!}



  @yield('link')
  </head>
  <body>

   <nav role="navigation" class="navbar navbar-default">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
       <a href="#" class="navbar-brand"> Admin </a>
     </div>
     <!-- Collection of nav links, forms, and other content for toggling -->
     <div id="navbarCollapse" class="collapse navbar-collapse">
       <ul id="main-nav" class="nav navbar-nav">
         <li><a href="{{ url('admin/coins') }}">Coins</a></li>
         <li><a href="{{ url('admin/bitcoin') }}">Bitcoin</a></li>
         <li><a href="{{ url('admin/dogecoin') }}">Dogecoin</a></li>
         <li><a href="{{ url('admin/litecoin') }}">Litecoin</a></li>
         <li><a href="{{ url('admin/dash') }}">Dash</a></li>
         <li><a href="{{ url('admin/peercoin') }}">Peercoin</a></li>
         <li><a href="{{ url('admin/primecoin') }}">Primecoin</a></li>
         <li><a href="{{ url('admin/order') }}">Order</a></li>
         <li><a href="{{ url('admin/news') }}">News</a></li>
         <li><a href="{{ url('admin/faq') }}">FAQ</a></li>
       </ul>
        <a href="{{ url('admin/logout') }}" class="right-nav-text"> Logout <img src="{{url('img/logout.png')}}"  width="30"> </a>
     </div>
   </nav>

    <div id="content">
        @if(isset($faucetName))
            <h3 class="center-bold"> {!! strtoupper($faucetName) !!} - SETTINGS  </h3>
        @endif
        @yield('content')
    </div>

  </body>
</html>