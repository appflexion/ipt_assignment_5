@extends('layouts.base')

@section('body')
    <a href="{{route('posts.index')}}" class="pull-right btn btn-primary">Back</a>
    <br>
    @component('components.post')
        @slot('title') {{ $post->title }} @endslot
        @slot('author') {{ $post->author->name }} @endslot
        @slot('date') {{ $post->created_at->diffForHumans() }} @endslot
        {!! $post->content !!}

    @endcomponent

    <div class="form-inline">
        <div class="col-sm-6">
            <textarea name="" id="content" style="width:400px;" class="form-control"></textarea>
            <input type="button" id="comment_btn" value="Submit" class="btn btn-sm btn-warning" style="cursor: pointer">            
        </div>
        
    </div>


    <div class="comments" style="margin-top:10px;">        
        
        @forelse($post->comments as $comment)
            @component('components.comment')
                @slot('author') {{ $comment->author->name }}  @endslot
                {{ $comment->content }}
            @endcomponent
        @empty
        <br>
        <div class="col-sm-12">
            <p>No Comments</p>
        </div>
        @endforelse
    </div>

@endsection

@section('scripts')

<script>
    $("#comment_btn").click(function(){
        var comnt = $("#content").val();
        $.ajax({
            url:"{{route('comment.store',$post)}}",
            method:"POST",
            data:{content:comnt},
            success:(result)=>{
                console.log(result);
               var html = '<div class="comment"> <div class="comment-author" style="font-weight:bolder;">'+  result.author +'</div>  <p class="comment-content">' + result.content  +  '</p></div>';
            $(".comments").prepend(html);
            }
        })
    });

</script>

@endsection