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
  </head>
  <body>

    @include('dashboard.navbar')

    @include('components.message')

    <div id="content" class="content1k">
        @yield('content')
    </div>

    @include('components.footer')

  </body>
</html>