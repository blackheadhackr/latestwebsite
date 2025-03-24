<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.104.2">
        <title>@yield('title')</title>
        <link rel="canonical" href="http://127.0.0.1:8000/">
        @include('common.headlinks')
    </head>
    <body>
        @include('common.topbar')
        <div class="container-fluid">
            <div class="row">
                @include('common.sidebar')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">@yield('pagename')</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            {{-- put some important content --}}
                        </div>
                    </div>
                    <div class="table-responsive border rounded">
                    {{-- content section here --}}
                    @section('main')
                    
                    @show
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
