@extends('layout')
@section('title', 'Post Home Page')
@section('content')
<body>
    <h1>List of Posts</h1>

    <h3>Below this is the Post Modules that you can see</h3>
    <br>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <br>
        <a href="{{ route('create-post') }}" class="btn btn-primary">Create Post</a></body>
        <br>    
        <div class="post-list">
            
                @foreach ($posts as $post) <!--Make Post-->
                <br>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="picture">
                            <img alt="Opt wizard thumbnail" src="https://bootdey.com/img/Content/user_1.jpg">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5> 
                            <i class="fa fa-calendar"></i>
                            Created in: {{ $post->created_at->format('M d, H:i') }} <!--Time zones-->
                        </h5>
                        <h4>
                            Poster Name: {{ $post->user->name }} <!--Show Name-->
                        </h4>
                        <h4>
                            {{ $post->title }} <!--Show Title-->
                        </h4>
                        
                        <p class="description">{{ $post->contents }}</p>    
                    </div>
                    <div class="col-sm-4" data-no-turbolink="">


                    <!--TRYING TO EDIT AND UPDATE-->
                    <a href="{{ route('edit-post', ['post' => $post->id]) }}" title="Edit Post">
                    <button class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </button>
                    </a>




                    <!--DELETE FINALLY WORKS-->
                    <form action="{{ route('delete-post', ['post' => $post->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                    </form>


                    
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
