


@extends('master')

@section('content')


<div class="container">



      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          </form>
         <h1>Add post</h1>
                    <form enctype="multipart/form-data" class="form-group" action="addpost" method="post">
              {{csrf_field()}}
                <input type="text" placeholder="Title" class="form-control input-lg form-group" id="title" name="title">
               
                       <select class="form-control input-lg form-group" name="cat_id">
                         
                          <option value="1">php</option>
                           <option value="2">Web desgn</option>
                            <option value="3">java script</option>
                             <option value="4">Html</option>

                       </select>
                  
                      <textarea class="form-group form-control input-lg" placeholder="your post" rows="4" name="body" id="body"></textarea>

                      <input type="file"  class="form-control  form-group" id="url" name="url">
                  <input type="submit"  value="Add Post"  class="btn btn-danger input-lg  ">
                  
                    
              </form>
              <div style="color: red">
              @foreach($errors->all() as $error)
               {{$error}} <br>
              @endforeach

              </div>
        <?php  
       
             $posts=Auth::user()->posts()->orderBy('id', 'DESC')->get();
             
                
              
               echo "Your hade posted ".sizeof($posts) ." posts";

             ?>


             @foreach($posts as $post)
             

        
          <!-- Title -->
         <div>
          <h1 class="mt-4">
              <a href="/post/{{$post->id}}">{{$post->title}}</a>


          </h1>
         
          <a href="/category/{{$post->category->name}}">{{$post->category->name}}</a>

          <!-- Author -->
            <a  href="#" class="dropdown-toggle " data-toggle="dropdown">... <span class="caret" ></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/deletPost/{{$post->id}}">delet</a></li>
            <li><a href="/setting">editing</a></li>
          
           
          </ul>

          <hr>

        

          <p>Posted on   {{$post->created_at->format('l jS \\of F Y h:i:s A') }}</p>
           
          
          <!-- Preview Image -->
         
          <hr>

          <!-- Post Content -->
          <p class="lead"><?=substr($post->body, 0,120) ?></p>
          
          
           @if($post->url)
           <img class="img-fluid rounded" src="../img/{{$post->url}}" alt="" style="width: 900px;height: 300px">

          @endif
            <br>
            <?php   
            $like_count=0;
           $dislike_count=0; 
           $like_state='btn-secondary';
           $dislike_state='btn-secondary';

           ?>
            @foreach($post->likes as $like )
            <?php 
          

                 if ($like->like==1) {
                   # code...
                  $like_count++;
                 }
                 else
                 {
                  $dislike_count++;

                 }

                 if (Auth::check()) {
                   
if($like->like==1 && Auth::user()->id==$like->user_id)
                 {
                  $like_state='btn-success';
                 }

                  if($like->like==0 && Auth::user()->id==$like->user_id)
                 {
                  $dislike_state='btn-danger';
                 }


                 }
                 


             ?>

            @endforeach
          <a class="  btn btn-primary" href="/post/{{$post->id}}"> Read More</a>

          <button id="{{$post->id}}l"  class=" like btn {{$like_state}} " postId="{{$post->id}}" datalike="{{$like_state}}">Like<span class="glyphicon glyphicon-thumbs-up"> </span> <span id="{{$post->id}}Cl">{{$like_count}}</span> </button>



          <button  id="{{$post->id}}d" class="dislike btn {{$dislike_state}} " postId="{{$post->id}}" datalike="{{$dislike_state}}">Dislike<span class="glyphicon glyphicon-thumbs-down"></span> <span id="{{$post->id}}Cd">{{$dislike_count}}</span> </button>



          <!-- <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote> -->


         

          
          <hr>
          </div>
          @endforeach 


             



        


        </div>


@stop