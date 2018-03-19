
<div class="info">
    <div class="time">
        {!! $post->created_at->diffForHumans() !!}
    </div>
    <div class="author">
        <span><a href="#">{{ $post->user->display() }}</a></span>
    </div>
</div>