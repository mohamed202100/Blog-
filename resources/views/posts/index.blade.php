@extends('layouts.app')

@section('body-content')

<a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
<table class="table mt-5 container">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Post Createor</th>
      <th scope="col">Created At</th>
      <th scope="col" colspan="3">ِActions</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->user ? $post->user->name : 'user not found'}}</td>
            <td>{{$post->created_at}}</td>
            <td colspan="3">
                <a href = "{{route('posts.show',['id'=>$post->id])}}" class="btn btn-info">View</a>
                <a href = "#" class="btn btn-primary">Edit</a>
                <a href = "#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach

  </tbody>
</table>

@endsection
