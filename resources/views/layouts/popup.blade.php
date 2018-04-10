<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Consultant Registration Scheme') }}</title>

            <title style="text-transform: uppercase">{{ config('app.name') }}</title>
            {!!Html::style('css/bootstrap.min.css')!!}
            {!!Html::style('css/select2.min.css')!!}
            {!!Html::style('css/justified-nav.css')!!}
            {!!Html::style('css/templatemo_style1.css')!!}
            {!!Html::style('css/parsley.css')!!}
            
            
            {!!Html::style('css/ionicons.min.css')!!}
            {!!Html::style('css/bootstrap.min.css')!!}
            {!! Html::script('js/jquery.min.js')!!}
            {!!Html::style('css/dataTables.min.css')!!}
            {!! Html::script('js/jquery.dataTables.min.js')!!}
            {!! Html::script('js/bootstrap.min.js')!!}

            
            @stack('extraStyles')

            <!-- Styles -->
            <link href="/css/app.css" rel="stylesheet">
            <style type="text/css">

                footer {
                    background-color: green;
                    color: white;
                    padding: 15px;
                }


            </style>
          
            
            <!-- Scripts -->
            <script>
                window.Laravel = <?php
    echo json_encode([
        'csrfToken' => csrf_token(),
    ]);
    ?>
            </script>
</head>
<body>
<div class="container">
    <div>
      <img src="{{URL::asset('/image/banner1.png')}}" alt="profile Pic" height="100" width="2048", class="img-responsive cleaner">
    </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @stack('scripts');
    @if(App\Libs\Upload::$flag)
    {!! App\Libs\Upload::getInstance()->script() !!}
    @endif
</body>

</html>
