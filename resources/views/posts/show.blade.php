@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Post
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                        @include('flash::message')
                        <div class="post">
                                    <div class="content">
                                        <p>{!! $post->content !!}</p>
                                    </div>
                                    @component('components.user_info',['post'=>$post])
                                    @endcomponent
                        </div>
                </div>
            </div>
        </div>
        <div><h3>Түзетулер</h3></div>
        <div>
            @foreach ($post->translations as $translation)
                <div class="row">
                    <div class="col-md-3">
                            <button>Дұрыс</button><button>Дұрыста</button>
                    </div>
                    <div class="col-md-9">
                        <div class="row">{{ $translation->content }}</div>
                        <div class="row pull-left">
                                @component('components.user_info',['post'=>$post])
                                @endcomponent
                        </div>
                    </div>
                </div>
                <div></div>
            @endforeach
            
            {!! Form::open(['route'=>'translations.store']) !!}
                <div><h3>Текссті дұрыста:</h3></div>
                <script>
                    let postContent = '{!! $post->content !!}';
                    let saveURL = "{!! route('translate.store') !!}";
                </script>
                <div id="corrector_field"></div>
                <?php /*{!! Form::textarea('content',$post->content) !!} */?>
                {!! Form::hidden('post_id',$post->id) !!}
                <div>{!! Form::submit('Сақта') !!}</div>
            {!! Form::close() !!}
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
