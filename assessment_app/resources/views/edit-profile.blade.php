@extends('layout')
@section('title', 'Edit Profile')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <h2>Edit Profile</h2>
        <form action="{{ route('update-profile') }}" method="post">
            @csrf <!--csrf means Cross-Site request forgery-->

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary"
            onclick="return confirm('Are you sure you want to save changes?')"
              >Save Changes</button>
        </form>
    </div>
@endsection
