@extends('layouts.app')

@section('content')

<form action="{{route('posts.store')}}" method="POST">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title: </label>
    <input type="title" class="form-control" id="title" name="title" placeholder="Enter the title">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description: </label>
    <textarea  class="form-control" id="description" name="description" placeholder="Enter the description"></textarea>
  </div>
  <div class="mb-3">
    <label for="user_id" class="form-label">Post Createor: </label>
    <select name="user_id" id="user_id" class="form-control">
        @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    </div>
  <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection
