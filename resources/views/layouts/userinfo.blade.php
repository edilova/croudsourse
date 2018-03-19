<div class="info">
    <div class="time">
        {!! $post->created_at->diffForHumans() !!}
    </div>
    <div class="author">
        <span>{{ $post->user->display() }}</span>
    </div>
</div>