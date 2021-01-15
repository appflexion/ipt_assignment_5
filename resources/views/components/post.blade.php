<div class="blog-post">
    <h4 class="blog-post-title">{{ $title or "Default title" }}</h4>
    @if(isset($comments_count)) <div class="comment-count"> {{ !strcmp($comments_count->__toString(), "0") ? 'No' : $comments_count  }} comments</div> @endif
    <p class="blog-post-meta">{{ $date or new Carbon\Carbon() }} <a href="#">{{ $author }}</a></p>
    {{ $slot }}
</div>
<hr>
