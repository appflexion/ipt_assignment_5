<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

@include('layouts.partials.header')

<div class="blog-header">
    <div class="container">
        <h4 class="blog-title" style="font-size:30px!important;font-weight:bolder">{{ $title or "" }}</h4>
        <p class="lead blog-description">{{ $subtitle or "" }}</p>
    </div>
</div>

<main class="container">
    @if(Request::hasSession() && (Session::has('errors') || Session::has('success') || Session::has('info')
    || Session::has('warning') || Session::has('danger')))
        <div class="row">
            <div class="col-8">
               
                @foreach(['success', 'info', 'warning', 'danger'] as $type)
                    @if(Session::has($type))
                        <div class="alert alert-{{ $type }}">
                            {!! Session::get($type) !!}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
    @yield('body')
</main>


<script src="{{asset('js/jquery.js')}}"></script>
@yield('scripts')
</body>
</html>
