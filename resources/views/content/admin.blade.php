


@extends('master')

@section('content')


<div class="container">



      <div class="row">




        <!-- Post Content Column -->
        <div class="col-lg-8">


     <h1> Admin Control pannal</h1>

      <div>
        
                  <table class="table table-hover">
                     
                       <tr>
                          <th> #</th>
                          <th> Name</th> 
                          <th> Email</th>
                          <th>User</th>
                          
                          <th> Editor</th>
                          <th> Admin </th>



                       </tr>
                       @foreach($users as $user)
                       <tr>
                       <form method="Post" action="/add_role">
                        {{csrf_field()}}

                        <input type="hidden" name="email" value="{{$user->email}}">
                         <td>{{$user->id}}</td>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>

                          <td>
                         <input  onChange="this.form.submit()" type="checkbox" name="user" {{$user->hasRole('user')?'checked':''}}>
                         </td>
                         
                         

                          <td>
                         <input onChange="this.form.submit()" type="checkbox" name="editor" {{$user->hasRole('editor')?'checked':''}}>
                         </td>

                         <td>
                         <input onChange="this.form.submit()" type="checkbox" name="admin" {{$user->hasRole('admin')?'checked':''}}>
                         </td>
                         </form>
                       </tr>
                       @endforeach
                     

                  </table>



      </div>
        

        </div>


@stop