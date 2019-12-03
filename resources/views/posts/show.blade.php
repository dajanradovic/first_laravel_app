@extends('layouts.app')

@section('title')
Single post site
@endsection
<style>


.welcometext{

  color:white;
}
.commentsarea{
    font-style: italic;
    background-color: yellow;
    color: black;
}

</style>






@section('content')
<div class="container mt-5">
<div class="row">
<div class="col-md-4">
<h4  style="color:white;"><i><small>Hi,</small> {{$user->name}}</i></h4>
<br />
<p class="welcometext"><i>Welcome to your dashboard.
Click on edit or delete your post</i></p>

<a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit post</a>
<form  id="forma" action="/posts/{{$post->id}}" method="post" class="float-right">
    @csrf
    @method('DELETE')
<button id="ajax" type="button"  class="btn btn-danger float-right">Delete post</a>
</form>
</div>
<div class="col-md-8">
<div  class="mx-auto card mb-3" style="max-width: 900px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/storage/{{$post->image}}" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->body}}</p>
        <span class="badge badge-pill 
                        <?php if ($post->genre == 'punk') { echo ('badge-success'); }
        
                        else if($post->genre == 'pop') { echo ('badge-warning');}
                        else if($post->genre == 'rock') { echo ('badge-danger');}
                        else if($post->genre == 'heavy metal') { echo ('badge-secondary');}
                        else if($post->genre == 'alternative rock') { echo ('badge-primary');}
                        else if($post->genre == 'blues') { echo ('badge-info');}
                        else if($post->genre == 'grunge') { echo ('badge-light');}
                        else if($post->genre == 'hard rock') { echo ('badge-dark');} ?>">{{$post->genre}}</span>
        <p class="card-text"><small class="text-muted">Created at: {{$post->created_at}}</small></p>
      </div>
    </div>
    <div>
              @foreach ($comments as $comment)

              <?php if ($comment->post_id == $post->id){
              
              echo  ('<p class="commentsarea mt-1">"'.$comment->body . '"<small> by ' .$comment->poster_name . ' on ' . $comment->created_at . '</small></p>');} ?>
             @endforeach
              </div>
             
             
          </div>
  </div>
</div>
</div>
</div>
</div>


<script>


$('document').ready(function(){
 




  
$('#ajax').click(function(e){
  e.preventDefault();
  
      if (confirm ("Are you sure you want to delete this post?")){

            $('#forma').submit();

              };


    });
  });
</script>
@endsection



