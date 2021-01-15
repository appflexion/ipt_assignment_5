<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link {{request()->route()->uri =='posts' ? 'active' : ''}}" href="{{route('homepage')}}">Home</a>
         <a class="nav-link {{request()->route()->uri =='posts/create' ? 'active' : ''}}" href="{{ route('posts.create') }}">Create New Post</a>
               
        </nav>
    </div>
</div>