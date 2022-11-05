@extends('layouts.app')
@section('title') create @endsection

@section('content')
        <form method="POST" action="{{route('posts.store')}}">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputEmail1" >
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" ></textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    @foreach ($allUsers as $user)
                    <option value="{{$user->id}}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

@endsection
