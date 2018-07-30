 

@extends('master')

@section('content')


<div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
         
          <!-- Title -->
          <h1 class="mt-4">{{$post->title}}</h1>

          <!-- Author -->
         
           <a href="/category/{{$post->category->name}}">{{$post->category->name}}</a>
          <hr>

          <!-- Date/Time -->
          <p>Posted on   {{$post->created_at->format('l jS \\of F Y h:i:s A') }}</p>

          
          <!-- Preview Image -->
         
          <!-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->

          <hr>

          <!-- Post Content -->
          <p class="lead"><?=$post->body ?></p>
          @if($post->url)
          <img class="img-fluid rounded" src="../img/{{$post->url}}" alt="" style="width: 900px;height: 300px">

          @endif
          

          

          <!-- <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote> -->


         

          
          <hr>
         @if(Auth::check())
          <!-- Comments Form -->
            <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="/store/{{$post->id}}" method="post">
              {{csrf_field()}}
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          @endif



           @foreach($post->comments as $comment)
          <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$comment->user->name}}</h5>
             <p>{{$comment->body}}</p>
            </div>
          </div>
          @endforeach

          <!-- Comment with nested comments -->
       <!--    <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

             

            </div>
          </div> -->

        </div>

 

      

    <!-- /.container -->
    
@stop