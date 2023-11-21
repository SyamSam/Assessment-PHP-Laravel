@extends('layout')
@section('title', 'Edit Post')
@section('content')
<h1>Edit Post</h1>
<form action="{{ route('update-post', ['post' => $post->id]) }}" method="POST">
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="contents">Contents</label>
        <textarea name="contents" id="contents" class="form-control">{{ $post->contents }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
