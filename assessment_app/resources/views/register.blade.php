@extends ('layout')
@section ('title', 'Registration')
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

<!--For website registration page -->
    <div class="container">
    <h2 style="margin: auto">Registration</h2>
    <br>
    <form style="width 500px" action="{{route('register.post')}}" method="POST">
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
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>

    </div>


@endsection