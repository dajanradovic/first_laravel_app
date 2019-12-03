@extends('layouts.app')
@section('title')
Dashboard
@endsection

@section('content')

<style>
.flex-container {
  display: flex;
  flex-direction: column;
}

.welcometext{

  color:white;
}



</style>

<div class="container mt-5">
<div class="row">
<div class="col-md-4">
<h4  style="color:white;"><i><small>Hi,</small> {{$user->name}}</i></h4>
<br />
<p class="welcometext"><i>Welcome to your dashboard.
Click on any post if you want to read the post in its entirety, check the comments on it or edit it or delete the post</i></p>

<a type="button" href="{{url('/posts/create')}}" class="btn btn-warning">Add a new post</a>
</div>
<div class="flex-container">
@foreach ($posts as $post)
<a href="/posts/{{$post->id}}">
<div  title="Click to see more" class="mx-auto card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/storage/{{$post->image}}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text overflow-hidden" style="height:150px;">{{$post->body}}</p>
        <span class="badge badge-pill 
                        <?php if ($post->genre == 'punk') { echo ('badge-success'); }
        
                        else if($post->genre == 'pop') { echo ('badge-warning');}
                        else if($post->genre == 'rock') { echo ('badge-danger');}
                        else if($post->genre == 'heavy metal') { echo ('badge-secondary');}
                        else if($post->genre == 'alternative rock') { echo ('badge-primary');}
                        else if($post->genre == 'grunge') { echo ('badge-info');}
                        else if($post->genre == 'hard rock') { echo ('badge-dark');} ?>">{{$post->genre}}</span>
        <p class="card-text"><small class="text-muted">Created at: {{$post->created_at}}</small></p>
      </div>
    </div>
  </div>
</div>
</a>
@endforeach
<div>
{{ $posts->links() }}
</div>
</div>

</div>
</div>
@endsection
