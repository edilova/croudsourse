<div class="form_block">
    {!! Form::open(['route' => 'posts.store']) !!}
        <textarea name="content" style="width:100%;height:400px;"></textarea>
        {!! Form::submit('Текстті жібер') !!}
    {!! Form::close() !!}
</div>