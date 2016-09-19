<nav role="navigation" class="navbar navbar-default">
 <!-- Brand and toggle get grouped for better mobile display -->
 <div class="navbar-header">
   <a href="{{ url() }}" class="navbar-brand"> ReFaucet </a>
 </div>
 <!-- Collection of nav links, forms, and other content for toggling -->
 <div id="navbarCollapse" class="collapse navbar-collapse">
   <ul id="main-nav" class="nav navbar-nav">
     <li><a href="{{ url('bitcoin') }}">Bitcoin</a></li>
     <li><a href="{{ url('dogecoin') }}">Dogecoin</a></li>
     <li><a href="{{ url('litecoin') }}">Litecoin</a></li>
     <li><a href="{{ url('dash') }}">Dash</a></li>
     <li><a href="{{ url('peercoin') }}">Peercoin</a></li>
     <li><a href="{{ url('primecoin') }}">Primecoin</a></li>
     <li><a href="{{ url('faq') }}">FAQ</a></li>
   </ul>

   <a href="{{ url('auth/login') }}" class="right-nav-text"> Dashboard <img src="{{url('img/user.png')}}"  width="30"> </a>
   <a class="right-nav-text" href="//ru.refaucet.com"> <img src="{{url('img/rus-flag.jpg')}}"  width="30"> </a>
   <a class="right-nav-text"> <img src="{{url('img/usa-flag.jpg')}}" class="flag-enable" width="30"> </a>
 </div>
</nav>