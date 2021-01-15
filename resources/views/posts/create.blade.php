@extends('layouts.base', ['title' => 'New Post'])

@section('body')
    <form method="POST" action="{{route('posts.store')}}">
        {{csrf_field()}}
   <div class="form-row">
       <div class="form-group col-sm-8 {{$errors->has('title') ? 'form-error' : ''}}">
           <label for="title">Title</label>
           <input type="text" name="title" value="{{old('title')}}" id="title" class="form-control">
           @if($errors->has('title'))
        <p class="error-message">{{$errors->first('title')}}</p>
           @endif
       </div>

       <div class="form-group col-sm-8 {{$errors->has('content') ? 'form-error' : ''}}">
        <label for="">Content</label>
        <textarea name="content" class="ckeditor form-control" name="wysiwyg-editor">
            {{old('content')}}
        </textarea>
        @if($errors->has('content'))
        <p class="error-message">{{$errors->first('content')}}</p>
           @endif
    </div>
   </div>

    <div class="form-group col-sm-6">
    <input type="submit" class="btn btn-primary" value="Submit">
   </div>

</form>

@endsection


<style>
    .form-error input{
        border:1px solid tomato!important;
    }
    .error-message{
        color:tomato;
        font-size: 12px;
    }
</style>
<script src="http://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
