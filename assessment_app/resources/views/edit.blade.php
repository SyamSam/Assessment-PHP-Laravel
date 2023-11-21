@extends ('layout')
@section ('title', 'Edit User')
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
    <h2 style="margin: auto">Edit User</h2>
    <br>
    <form style="width: 500px;" action="{{ route('update-user', ['user' => $user->id]) }}" method="POST">
    @csrf



  <div class="mb-3">
    <label class="form-label">Full Name</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name }}"> <!--The value part is to pre-fill based on the edit thing-->
  </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" value="{{ $user->password }}">
  </div>
  <button type="submit" class="btn btn-primary"
  onclick="return confirm('Are you sure you want to update this user?')"
  >Update User</button>
</form>
<br>
<a href="{{ route('home') }}" class="btn btn-secondary">Go Back</a>

    </div>


@endsection