@extends ('layouts.welcome')



@section('fontlink')
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
@endsection

<style>

p{
    font-family: 'Roboto Mono', monospace !important;
    color: white;
    font-size: 40px;
    text-align: center;
    padding-top: 30px;
}
div{

    text-align:center;
}
small {

    
    font-family: 'Roboto Mono', monospace !important;
    color: white;
    font-size: 10px;
    text-align: center;
    
}
hr{

    border: 0.1px solid white !important;
    width: 50%;
}

.btn, btn-primary{

  width: 100px;
  padding: 10px;
  font-weight: bold;
  margin-top: 20px !important;
  margin-right: 10px;
  margin-left:10px;
 
  
}


</style>
@section('content')

    
   <p class="mt-5">Welcome to the blog where you can <br>review, read and comment some of <br>the most memorable music records </p>
   <hr>
   <div>
    <small>Please, login or register to start reading</small>
   </div>
   
   <a class="btn  btn-primary" href="{{ route('login') }}">Log in</a>
   <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>


   


    @endsection
