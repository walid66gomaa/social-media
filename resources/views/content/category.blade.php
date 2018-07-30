


@extends('master')

@section('content')


<div class="container">



      <div class="row">

 


        <!-- Post Content Column -->
        <div class="col-lg-8">

        <h1 class="mt-4">Category {{$name}}</h1>
           <?php  $cat=$posts[0]->category_id ?>
          @foreach($posts as $post)
          <!-- Title -->
          <h1 class="mt-4">
              <a href="/post/{{$post->id}}">{{$post->title}}</a>


          </h1>

          <!-- Author -->
         

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
          <a class="btn btn-primary" href="/post/{{$post->id}}"> Read More</a>

          

          <!-- <blockquote class="blockquote">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">Someone famous in
              <cite title="Source Title">Source Title</cite>
            </footer>
          </blockquote> -->


         

          
          <hr>
          @endforeach 


                 <h1>Add post to {{$name}} Category  </h1>
                    <form enctype="multipart/form-data" class="form-group" action="/addpost" method="post">
              {{csrf_field()}}
                <input type="text" placeholder="Title" class="form-control input-lg form-group" id="title" name="title">
               
             
                  
                      <textarea class="form-group form-control input-lg" placeholder="your post" rows="4" name="body" id="body"></textarea>


                       <select class="form-control input-lg form-group" name="cat_id">
                         
                          <option value="{{$cat}}">{{$name}}</option>
                       

                       </select>
                  

                      <input type="file"  class="form-control  form-group" id="url" name="url">
                  <input type="submit"  value="Add Post"  class="btn btn-danger input-lg  ">
                  
                    
              </form>
              <div style="color: red">
              @foreach($errors->all() as $error)
               {{$error}} <br>
              @endforeach

              </div>


        </div>

       


@stop