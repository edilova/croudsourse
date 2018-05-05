@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="pull-left">Сұрақтар</h1>
    <a class="btn btn-primary pull-right" href="{{ route('posts.create') }}">Шығармаңды жаз</a>
    </div>
    <div class="row">
        <div class="questions">
            @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-2">
                    <div>{!!  $post->translations_count !!}</div>
                    <div>түзету</div>
                </div>
                <div class="col-md-6" style="border:1px solid blue;margin-top:3px;">
                    <div class="row">
                        <a href="{{ route('posts.show',$post->id) }}">{{ str_limit($post->content,100) }}</a>
                    </div>
                    <div class="row pull-right">
                        @component('components.user_info',['post'=>$post])
                        @endcomponent
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection