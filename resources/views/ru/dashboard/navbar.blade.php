<nav role="navigation" class="navbar navbar-default nav-board">
 <!-- Brand and toggle get grouped for better mobile display -->
 <div class="navbar-header">
   <a href="{{ url() }}" class="navbar-brand"> ReFaucet </a>
 </div>
 <!-- Collection of nav links, forms, and other content for toggling -->
 <div id="navbarCollapse" class="collapse navbar-collapse">
   <ul id="main-nav" class="nav navbar-nav">
     <li><a href="{{ url('dashboard') }}"> Пользователь </a></li>
     <li><a href="{{ url('dashboard/referral') }}"> Рефералка </a></li>

   </ul>
   <a href="{{ url('auth/logout') }}" class="right-nav-text"> Выход <img src="{{url('img/logout.png')}}"  width="30"> </a>
 </div>
</nav>