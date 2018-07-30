


@extends('master')

@section('content')


<div class="container">



      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
   
        <h1>Our statistics</h1>
        <table class="table  table hover">
        <tr>
          <td>All Users</td>
          <td>{{$user_Count}}</td>
          

        </tr>

        <tr>
          <td>All Posts</td>
          <td>{{$post_Count}}</td>
          

        </tr>


        <tr>
          <td>All Comments</td>
          <td>{{$comment_Count}}</td>
          

        </tr>


        <tr>
          <td>All Likes</td>
          <td>{{$like_Count}}</td>
          

        </tr>
          

        </table>



        </div>


@stop