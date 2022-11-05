@extends('layouts.app')

@section('title') Edit @endsection
@section('content')
<form method="POST" action="{{route('posts.update',['post'=>$post->id])}}">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" >
      </div>

      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Description</label>
          <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" >{{$post->description}}</textarea>
        </div>

      <button type="submit" class="btn btn-primary">Update post</button>
    </form>
@endsection
