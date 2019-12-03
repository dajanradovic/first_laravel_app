@extends('layouts.app')
@section('title')
Edit current post
@endsection
@section('content')


<style>
label{

  color: white;
}

.form-control-file{

  color: white;
}

h6{

  color: white;
  text-decoration: underline;
}

.error {

  color: red;
}
</style>


<div class="container">

<h6><i>Enter new blog entry:</i></h6>
<br />
<form method="post" action="/posts/{{$post->id}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" value="{{old('title') ?? $post->title}}" name="title" >
   <div class="error"> {{$errors->first('title')}}</div>
  </div>



  <div class="form-group">
    <label for="body">Review</label>
    <textarea class="form-control"   name="body" rows="5" >{{old('body') ?? $post->body}}</textarea>
    <div class="error">   {{$errors->first('body')}}</div>
  </div>
  
  <div class="form-group">
    <label for="name">Pick a genre (you can pick more than one)
    </label>
    <select class="form-control" value="{{$post->genre}}"   name="genre">
    
      <option <?php echo $post->genre == "pop" ? "selected" : "";?> >pop</option>
      <option  <?php echo  $post->genre == "rock" ? "selected" : "";?>>rock</option>
      <option <?php echo $post->genre == "punk" ? "selected" : "";?>>punk</option>
      <option <?php echo  $post->genre == "heavy metal" ? "selected" : "";?>>heavy metal</option>
      <option <?php echo $post->genre == "alternative rock" ? "selected" : "";?>>alternative rock</option>
      <option <?php echo  $post->genre == "grunge" ? "selected" : "";?>>grunge</option>
      <option <?php echo $post->genre == "hard rock" ? "selected" : "";?>>hard rock</option>
      
      
        
      

     
    </select>
    <div class="error">  {{$errors->first('genre')}}</div>
  </div>

  <div class="form-group">
    <label for="image">Pick a cover-photo</label>
    <input type="file"  value="{{$post->image}}" class="form-control-file" name="image" value="{{old('image')}}">
    <div class="error"> {{$errors->first('image')}}</div>
  </div>

  <button type="submit" class="btn btn-primary mb-2">Post review</button>
  
</form>
</div>

@endsection