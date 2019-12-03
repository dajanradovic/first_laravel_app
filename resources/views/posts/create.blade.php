@extends('layouts.app')
@section('title')
Create new post
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

<h6 class="mt-5"><i>Enter new blog entry:</i></h6>
<br />
<form method="post" action="{{url('posts')}}" enctype="multipart/form-data">

    @csrf

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" value="{{old('title')}}" />
    <div class="error"> {{$errors->first('title')}}</div>
  </div>



  <div class="form-group">
    <label for="body">Review</label>
    <textarea class="form-control" name="body" rows="3" >{{old('body')}}</textarea>
    <div class="error">   {{$errors->first('body')}}</div>

  </div>
  
  <div class="form-group">
    <label for="name">Pick a genre (you can pick more than one)
    </label>
    <select class="form-control" name="genre">
    
      <option>pop</option>
      <option>rock</option>
      <option>punk</option>
      <option>heavy metal</option>
      <option>alternative rock</option>
      <option>grunge</option>
      <option>hard rock</option>
      
      
        
      

     
    </select>
    <div class="error">  {{$errors->first('genre')}}</div>

  </div>

  <div class="form-group">
    <label for="image">Pick a cover-photo</label>
    <input type="file" class="form-control-file" name="image" value="{{old('image')}}">
    <div class="error"> {{$errors->first('image')}}</div>

  </div>

  <button type="submit" class="btn btn-primary mb-2">Post review</button>
  
</form>
</div>

@endsection