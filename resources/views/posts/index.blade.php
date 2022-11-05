@extends('layouts.app')

@section('title') Index @endsection
@section('content')
<div class="text-center">
  <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Slug</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post->id}}</th>
        <td>{{$post->title}}</td>
        @if($post->user)
            <td>{{$post->user->name}}</td>
        @else
            <td>undefined</td>
        @endif
        {{-- <td>{{\Carbon\Carbon::parse($post['created_at'])->formate('Y-m-d')}}</td> --}}
        <td>{{$post->created_at}}</td>
        <td>{{$post->slug}}</td>
        <td>
            {{-- <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a> --}}
            <a href="{{route('posts.show', ['post' =>$post['id']])}}" class="btn btn-info">View</a>
            <a href="{{route('posts.edit',['post'=>$post['id']])}}" class="btn btn-primary">Edit</a>
            <form class="d-inline" method="POST" action="{{route('posts.destroy',['post'=>$post['id']])}}" >
                @method('DELETE')
                @csrf
                <button onclick="return confirm('Do you want to delete this record ?')" class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="mb-3">
    @foreach ($posts as $user)
        {{ $user->name }}
    @endforeach
</div>
{{ $posts->links() }}

@endsection
