@include('flash::message')
<div>
    Жарияланды:<span>{!! $post->created_at !!}</span>
    Автор:<span>{{ $post->user->display() }}</span>
</div>
<!-- Content Field -->
<div>
    <p>{!! $post->content !!}</p>
</div>
{!! Form::open(['route'=>'translations.store']) !!}
    <div>Дұрыста:</div>
    {!! Form::textarea('content',$post->content) !!}
    {!! Form::hidden('post_id',$post->id) !!}
    <div>{!! Form::submit('Сақта') !!}</div>
    <div><button>Дұрыс</button></div>
{!! Form::close() !!}
@foreach ($post->translations as $translation)
    <div>{{ $translation->user->display() }}</div>
    <div>{{ $translation->content }}</div>
    <div><button>Дұрыс</button><button>Дұрыста</button></div>
@endforeach
