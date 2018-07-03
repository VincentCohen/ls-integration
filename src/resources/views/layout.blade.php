<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>App Name - @yield('title')</title>

        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .btn-sq-lg {
                width: 150px !important;
                height: 150px !important;
            }

            .btn-sq {
                width: 100px !important;
                height: 100px !important;
                font-size: 10px;
            }

            .btn-sq-sm {
                width: 50px !important;
                height: 50px !important;
                font-size: 10px;
            }

            .btn-sq-xs {
                width: 25px !important;
                height: 25px !important;
                padding:2px;
            }
        </style>
    </head>
    <body>
        @section('sidebar')

        @show

        <div class="container">
            <div class="container">
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                    <h2>@yield('subtitle')</h2>
                    <p class="lead">@yield('description')</p>
                </div>
            @yield('content')
                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2017-2018 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>
        </div>
    </body>
</html>