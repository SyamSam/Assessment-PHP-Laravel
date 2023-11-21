@extends('layout')
@section('title', 'Home')
@section('content')
<body>
    <h1>Welcome Dear {{ Auth::check() ? Auth::user()->name : '' }} !!</h1>
    <h2>List of Users</h2>

    <h3>Below this is the User Modules that you can see</h3>
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Edit Users</th>
                <th>Delete Users</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('edit-user', ['user' => $user->id]) }}" title="Edit User">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true">

                        </i> Edit</button></a></td>

                    <td>
                    @if ($user->id !== Auth::user()->id) <!--To prevent user deleting own account-->
    
                    <a href="{{ route('delete-user', ['id' => $user->id]) }}" title="Delete"
                    onclick="return confirm('Are you sure you want to delete this user?')">
                        <button class="btn btn-primary btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                        </button>
                    </a>

                    @else
                    <!-- Shows Message of you cannot delete account -->
                    <span class="disabled-delete-button">Cannot Delete</span>
                    @endif
</td>
 </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('create-user') }}" class="btn btn-primary">Create User</a></body>
@endsection
