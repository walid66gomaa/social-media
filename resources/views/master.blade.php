<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post </title>

    <!-- Bootstrap core CSS -->
   <!--  <link href="design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    Custom styles for this template
    <link href="design/css/blog-post.css" rel="stylesheet"> -->


      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/mydesign.css" rel="stylesheet"> 

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/post">WGB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/post">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/stat">Statistic</a>
            </li>
            @if(Auth::check())
            @if(Auth::user()->hasRole('admin'))
            <li class="nav-item">
              <a class="nav-link" href="/admin">admin</a>
            </li>
            @endif
           

             <li class="dropdown nav-item">
 <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">{{Auth::User()->name}} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/profile">view profile</a></li>
            <li><a href="/setting">setting profile</a></li>
          
           
          </ul>
        </li>

            <li class="nav-item">
              <a class="nav-link" href="/logout">Log Out</a>
            </li>
                
                @else
       <li class="nav-item"><a  class="nav-link" data-toggle="modal" data-target="#mymodel"><span class="glyphicon glyphicon-user"></span> Log in </a></li>

    <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#mymodel2"><span class="glyphicon glyphicon-log-in"></span> register</a></li>



            @endif
            
          
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
   @yield('content')



         



        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="/category/Web_Design">Web Design</a>
                    </li>
                    <li>
                      <a href="/category/HTML">HTML</a>
                    </li>
                    <li>
                      <a href="/category/php">PHP</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="/category/JavaScript">JavaScript</a>
                    </li>
                    <li>
                      <a href="/category/CSS">CSS</a>
                    </li>
                    <li>
                      <a href="/category/Tutorials">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>



 

  <!-- ///////////////////////////////////// -->
            <!--        section subscribe-->
        
        <section class="sub ">
        
            <div class="modal fade" role="dialog" id="mymodel">
            
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            
            <h1 class="modal-title text-primary">welcome</h1>

            <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form class="form-group" method="post" action="/login">
               {{csrf_field()}}
              <label >Email
                <input type="text"  class="form-control" name="email">
                
                </label>
                   
                    <label >Password
                <input type="password"  class="form-control" name="password">
                
                </label>
                  
                <input type="submit" class="btn btn-primary" value="Log in">
                    
              </form>
            
            
            </div>
            <div class="modal-footer">
            
                <button data-dismiss="modal" data-toggle="modal" data-target="#mymodel2" class="close"  style="margin-right: 10px;float: left; opacity: .8;">sign up</button>

                <button class="close" data-dismiss="modal">close</button> 
            </div>
                </div>
                </div>

                <div style="color: red">
              @foreach($errors->all() as $error)
               {{$error}} <br>
              @endforeach

              </div>
 
        </div>
        
        
        <div class="sign-up">
        
            <div class="modal fade" role="dialog" id="mymodel2">
            
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            
            <h3 class=" lead modal-title text-center text-danger">Sign Up For Newsletter Dont Worry about Spam</h3>
            <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="raw">
               <form class="form-group" action="/regester" method="Post">
               {{csrf_field()}}
              <label class="col-ms-6" >User Name
                <input type="text"  class="form-control" id="name" name="name">
                
                </label>
                   
                   <label >Email
                <input type="text"  class="form-control" id="email" name="email">
                
                </label>
                   
                   <label >PassWord
                <input type="password"  class="form-control">
                
                </label>
                   
                   <label >confirm Password
                <input type="password"  class="form-control" id="password" name="password">
                
                </label>
                <input type="submit"  value="sign Up"  class="btn btn-danger">
                    
              </form>
                   
                   </div> 
            
            
            </div>
            <div class="modal-footer">
            
            <button data-dismiss="modal" data-toggle="modal" data-target="#mymodel" class=" close lead"  style="margin-right: 10px; float:left; opacity:.8" >I have acount <span class="glyphicon glyphicon-user"></span></button>

            <button class="close" data-dismiss="modal">close</button>
               
            </div>
                </div>
                </div>
 
        </div>
        </div>
        
        </section>



        


           <!-- ////////////////////////////// -->


    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
<!--     <script src="design/vendor/jquery/jquery.min.js"></script>
    <script src="design/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
      

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script type="text/javascript" src= "{{url('/js/likeAjax.js')}}" "likeAjax.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  
<script type="text/javascript">
  


 var token="{{ Session::token() }}";

</script>
  </body>


     <head>
    <link href="../css/mydesign.css" rel="stylesheet"> 

    </head>

</html>
