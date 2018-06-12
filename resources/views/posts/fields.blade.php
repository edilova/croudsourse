<!-- Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Шығарманың мәтіні:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сақтау', ['class' => 'btn btn-primary clientTour2']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default clientTour3">Жою</a>
</div>




<!-- introJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>

<script type="text/javascript">
      if (RegExp('multipage', 'gi').test(window.location.search)) {
        var intro = introJs();

            intro.setOptions({
                steps: [
                   {
                        element: "#content",
                        //   intro: "This is a dropdown",
                        intro:'Шығарманың мәтінің осы жерге жазыныз',

                    },
                    {
                        element: ".clientTour2",
                        intro: 'Шығарманың мәтінің сактау ушин батырманы басыныз',
                        // position: 'left'
                    },
                    {
                        element: ".clientTour3",
                        intro: 'Шығарманың мәтінің жою ушин батырманы басыны',
                        // position: 'left'
                    }
                ]                 
            });
            intro.start()
      }
       
    </script>