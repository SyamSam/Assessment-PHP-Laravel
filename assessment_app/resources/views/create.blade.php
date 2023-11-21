@extends ('layout')
@section ('title', 'Create User')
@section ('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--For website Creating user page -->
    <div class="container">
    <h2 style="margin: auto">Create User</h2>
    <br>
    <form style="width: 500px;" action="{{ route('store-user') }}" method="POST">
    @csrf



  <div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Create User</button>
</form>

<p>Don't want to Create a User? Go back here</p>
<a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>

    </div>


@endsection