<table class="table table-responsive" id="translations-table">
    <thead>
        <tr>
            <th>Post Id</th>
        <th>User Id</th>
        <th>Content</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($translations as $translation)
        <tr>
            <td>{!! $translation->post_id !!}</td>
            <td>{!! $translation->user_id !!}</td>
            <td>{!! $translation->content !!}</td>
            <td>
                {!! Form::open(['route' => ['translations.destroy', $translation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('translations.show', [$translation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('translations.edit', [$translation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>