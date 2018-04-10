<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title style="text-transform: uppercase">{{ config('app.name', $category.' Consultant') }}</title>
        <title style="text-transform: uppercase">{{ config('app.name', $category.' Consultant') }}</title>
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
    <body style="background-color:white">

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
                        <a style="color:blue;text-transform: uppercase"class="navbar-brand" href="{{ url('/') }}">
                            {{$category}} Consultant
                        </a>



                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">

                       
                        
                    </div>
                </div>
            </nav>
            <div class="row">
               
                   

                        
               <div id='examContainer'> @yield('content') </div>
            </div>
        </div>

        @stack('scripts');
        @if(App\Libs\Upload::$flag)
        {!! App\Libs\Upload::getInstance()->script() !!}
        @endif


      


    </body>

</html>
