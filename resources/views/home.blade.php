@extends('layouts.app')
@section('title')
Reviews list
@endsection
@section('fontlink')
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
@endsection
<style>
#paraf{
    font-family: 'Roboto Mono', monospace !important;
    color: white;
    font-size: 40px;
    text-align: center;
    padding-top: 30px;
}

.commentsarea{
    font-style: italic;
    background-color: yellow;
    color: black;
}

textarea{

    width:100%;
}

.noposts{
    font-family: 'Roboto Mono', monospace !important;
    color:white;
    margin: 0 auto;
    font-size:20px;
}
</style>


@section('content')

<p id="paraf" class="mt-5">Welcome to the blog where you can <br>review, read and comment some of <br>the most memorable music records </p>
 <hr style="border: 1px solid white; color:white;">
   
   
   
 <div class="container mt-5">
<div class="row" >

@if ($posts->count() ==null)

<p class="noposts">There are currently no posts</br>
    Click <a href="{{url('/posts/create')}}" class="btn btn-primary btn-sm">here</a> to start posting
</p>


@else

@foreach ($posts as $post)
       
   

<div class="col-md-12" style="margin: 0 auto;">
    <div  class="mx-auto card mb-3" style="max-width: 1200px;">
        <div class="row no-gutters">
             <div class="col-md-4">
                  <img src="/storage/{{$post->image}}" class="card-img" alt="...">
             </div>
             <div class="col-md-8">
               <div class="card-body">
                  <h5 class="card-title"><u>{{$post->title}}</u></h5>
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
          <form method="post" action="/comments/create">
             @csrf
             <div class="form-group">
             <input type="hidden" name="post_id" value="{{$post->id}}"/>
             <textarea class="form-control mt-1"name="body" placeholder="Enter comment"></textarea>
             <input type="submit" class="btn btn-primary mt-1" value="submit">
             </div>
          </form>
          
        </div>
        
    </div>

@endforeach

@endif


</div>

</div>


@endsection
