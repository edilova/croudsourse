@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">


    </div>
</div>
@endsection
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                display:flex;
                width:90%;
            }
            textarea{
                width:90%;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .content div{
                border:1px solid red;
            }
            .form_block{
                width:50%;
            }
            .questions_block{
                width:50%;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if (Auth::user()->anonymous)
                            Аноним # {{ Auth::user()->id }}
                            <a href="{{ route('login') }}">Системаға кір</a> | 
                            <a href="{{ route('register') }}">Тіркел</a>
                        @else
                            {{ Auth::user()->name }}
                            <a href="{{ route('logout') }}">Шығу</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="form_block">
                    {!! Form::open(['route' => 'posts.store']) !!}
                        <textarea name="content" style="width:100%;height:400px;"></textarea>
                        {!! Form::submit('Текстті жібер') !!}
                    {!! Form::close() !!}
                </div>
                <div class="questions_block">
                    @foreach ($posts as $post)
                        <div><a href="{{ route('posts.show',$post->id) }}">{{ $post->content }}</a></div>
                        <div>{!!  $post->translations_count !!} түзету бар</div>
                    @endforeach
                </div>

            </div>

            <!--<div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>-->
        </div>
    </body>
</html>
