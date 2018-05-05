<!-- Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Шығарманың мәтіні:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сақтау', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default">Жою</a>
</div>
