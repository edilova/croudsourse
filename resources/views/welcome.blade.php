@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Сұрақтар</h1>
        <a class="btn btn-primary" href="#">Шығармаңды жаз</a>
    </div>
    <div class="row">
        <div class="questions">
            @foreach ($posts as $post)
                <div class="col-md-2">
                    <div>{!!  $post->translations_count !!}</div>
                    <div>түзету</div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <a href="{{ route('posts.show',$post->id) }}">{{ str_limit($post->content,100) }}</a>
                    </div>
                    <div class="row pull-right">
                        @component('components.user_info',['item'=>$post])
                        @endcomponent
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection