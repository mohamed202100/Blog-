@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
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
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td colspan="3">
                        <a href = "{{ route('posts.show', ['id' => $post->id]) }}" class="btn btn-info">View</a>
                        <a href= "{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" name="delete">
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
