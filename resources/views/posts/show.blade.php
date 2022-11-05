@extends('layouts.app')

@section('title') Show @endsection
@section('content')
<div class="card">
  <h5 class="card-header">Post Info</h5>
  <div class="card-body">
    <h5 class="card-title">Title: {{$post->title}}</h5>
    <p class="card-text">Description :</p>
    <p class="card-text">{{$post->description}}</p>

  </div>
</div>
<div class="card">
  <h5 class="card-header">Post Creator Info</h5>
  <div class="card-body">
    <h5 class="card-title"></h5>
    {{-- @dd($post->user) --}}
    <p class="card-text"><span>Name:</span> {{$post->user->name}}</p>
    <p class="card-text"><span>Email:</span> {{$post->user->email}}</p>
    <p class="card-text"><span>Created at:</span> {{$post->created_at}}</p>

    <a href="{{route('posts.index')}}" class="btn btn-primary">Go back</a>
    <input type="file" name="photo">
  </div>
</div>
@endsection
