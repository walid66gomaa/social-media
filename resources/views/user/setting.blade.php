


@extends('master')

@section('content')


<div class="container">



      <div class="row">




        <!-- Post Content Column -->
        <div class="col-lg-8">
            
             <h2>Edit Your Acccount Data</h2>
            <form action="/editProfile" method="post" class="form-group form-control">
            {{csrf_field()}}
           
           <br>

           <div class="form-group row">
  <label for="pass" class="col-3 col-form-label">Current Password</label>
  <div class="col-8">
    <input class="form-control" type="password" name="password" id="pass">
  </div>
</div>

             <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
         <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <a data-toggle="collapse" href="#collapse1">Change Password</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
                 <div class="form-group row">
              <label for="newPass" class="col-3 col-form-label">New Password</label>
              <div class="col-8">
                <input class="form-control" type="text" name="newPass" id="newPass" >
              </div>
            </div>

            <div class="form-group row">
              <label for="confPass" class="col-3 col-form-label">Confirm Password</label>
              <div class="col-8">
                <input class="form-control" type="text" name="confPass" id="confPass" >
              </div>
            </div>
                   
   
     
    </div>
  </div>
</div>

<div class="form-group row">
  <label for="name" class="col-3 col-form-label">You Name</label>
  <div class="col-8">
    <input class="form-control" type="text" name="name" id="name" value="{{ Auth::user()->name }}">
  </div>
</div>

<div class="form-group row">
  <label for="email" class="col-3 col-form-label">your Email</label>
  <div class="col-8">
    <input class="form-control" type="text" name="email" id="email" value="{{ Auth::user()->email}}">
  </div>
</div>

<div class="form-group row">
  
  <div class="col-3">
   <input type="submit" class="btn btn-primary form-control" value="Edit">
  </div>
</div>

            


          </form>

          <!-- echo Session::get("message"); -->

          <p style="color: red">{{Session::get("message")}}</p>

        </div>


@stop