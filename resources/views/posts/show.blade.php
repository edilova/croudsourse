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
                                    <div class="content" id="content">
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
                                @component('components.user_info',['post'=>$translation])
                                @endcomponent
                        </div>
                    </div>
                </div>
                <div></div>
            @endforeach
            {{--
            {!! Form::open(['route'=>'translations.store']) !!}--}}
                <div><h3>Текстті дұрыста:</h3></div>
                <script>
                    let postContent = '{!! $post->content !!}';
                    let saveURL = "{!! route('translations.store') !!}";
                    let post_id = {!! $post->id !!};
                    let csrf_token = '{{ csrf_token() }}';
                </script>
                <div id="corrector_field"></div>
                <?php /*{!! Form::textarea('content',$post->content) !!} */?>
                {{--{!! Form::hidden('post_id',$post->id) !!}--}}
                {{--<div
                    >{!! Form::submit('Сақта') !!}</div>--}}
            {{--{!! Form::close() !!}--}}
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>
    <script type="text/javascript">
        // var intro = introJs();
        //     // modal.style.display = "none";

        //     intro.setOptions({
        //         steps: [
        //             {
        //                 element: "#corrector_field",
        //                 //   intro: "This is a dropdown",
        //                 intro:'draftTips1',

        //             },
        //             {
        //                 element: "#draftTips2",
        //                 intro: "draftTips1",
        //             }
        //         ]
        //     });

        //     intro.setOption().start();
       
       if (RegExp('multipage', 'gi').test(window.location.search)) {
        var intro = introJs();

            intro.setOptions({
                steps: [
                   {
                        element: "#content",
                        //   intro: "This is a dropdown",
                        intro:'Шығарманың мәтіні',

                    },
                    {
                        element: "#corrector_field",
                        intro: 'Шығарманың мәтінің тузелеу ушiн мәтінді выделите',
                        // position: 'left'
                    }
                ]                 
            });
            intro.start()
      }
    </script>
@endsection
