


@extends('master')

@section('content')


<div class="container">



      <div class="row">




        <!-- Post Content Column -->
        <div class="col-lg-8">
                                   
    <form class="form-control" action="/regester" method="Post">
    {{csrf_field()}}
  <div class="form-group">
     <label for="name">your name</label>
    <input type="name" class="form-control" id="name" name="name" placeholder="Enter email">
    
  </div>
 <div>
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>




        </div>


@stop