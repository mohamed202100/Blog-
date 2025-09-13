@extends('layouts.app')

@section('body-content')

<form>
  <div class="mb-3">
    <label for="title" class="form-label">Title: </label>
    <input type="title" class="form-control" id="title" placeholder="Enter the title">
  </div>
  <div class="mb-3">
  <label for="description" class="form-label">Description: </label>
  <textarea  class="form-control" id="description" placeholder="Enter the description"></textarea>
</div>
  <button type="submit" class="btn btn-success">Create</button>
</form>






@endsection
