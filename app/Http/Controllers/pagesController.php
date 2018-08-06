<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;   

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Role;
use App\Like;
use App\Comment;
use App\Category;
use DB;

class pagesController extends Controller
{
     public function Posts()
    { 
        $posts=post::orderBy('id', 'DESC')->get();
        $catogries=Category::orderBy('id', 'DESC')->get();
        
    	return view('content.post',compact('posts','catogries'));


    }

      public function Post($id)
    { 
    	$post=post::find($id);
    	return view('content.onepost',compact('post'));

    	
    }

    
     
// 
    public function addpost( Request $request)
    {    

    	$this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
            'url'=>'image|mimes:jpg,jpeg,gif,png'

    		]);

           $post=new post;

        if (request('url') !="") {
            $img_name=time().".".$request->url->getClientOriginalExtension();
              $post->url=$img_name;
               $request->url->move(public_path('img'),$img_name);
        }
    	 
        
         $post->title=request('title');
         $post->category_id=request('cat_id');
         $post->body=request('body');
       
         $post->user_id=Auth::user()->id;
         $post->save();

         
          
          
    	




    	return back();
    }




   public function category($name)
    { 
        $cat=Category::where('name',$name)->value('id');

        $posts=Post::where('category_id',$cat)->get();
        return view('content.category',compact('posts','name'));


    }

       public function admin()
    { 
      $users=User::all();
     return view('content.admin',compact('users'));  
       
        
    }
    
       public function editor()
    { 
       
         return view('content.editor');  
        
    }

    



       public function add_role( Request $request)
    { 



          $user=User::where('email',$request['email'])->first();
        $user->roles()->detach();
           
            

        if ($request['user']) {
            $user->roles()->attach(Role::where('name','user')->first());
            
        }

        if ($request['admin']) {
            $user->roles()->attach(Role::where('name','admin')->first());
            echo "admin";
        }

        if ($request['editor']) {
            $user->roles()->attach(Role::where('name','editor')->first());
            # code...
        }

         return back( );  
        
    }






       public function like(Request $request)
    { 
       
         
        $like_s=$request->like_s;
         $post_id=$request->post_id;
       $change_like=0;
        
        
         $like=DB::table('likes')
         ->where('post_id',$post_id)
         ->where('user_id',Auth::user()->id)
         ->first();
        
        if (!$like) {
            $newLike= new Like;
            $newLike->like=1;
            $newLike->post_id=$post_id;
            $newLike->user_id=Auth::user()->id;
            $newLike->save();
            $is_like=1;
        }
        elseif ($like->like==1) {
            DB::table('likes')
         ->where('post_id',$post_id)
         ->where('user_id',Auth::user()->id)
         ->delete();
         $is_like=0;
            
        }

         elseif ($like->like==0) {
            
               DB::table('likes')
         ->where('post_id',$post_id)
         ->where('user_id',Auth::user()->id)
         ->update(['like'=>1]);
         $change_like=1;
         $is_like=1;
          
            
        }
        $response=array(
            'is_like'=>$is_like,
            'change_like'=> $change_like,

            );
     return response($response,200);


    }


     public function dislike(Request $request)
    { 
       
         
        

        $like_s=$request->like_s;
         $post_id=$request->post_id;
         $change_dislike=0;

        ///////////////////////////

        DB::table('likes')
        ->where('post_id',$post_id)
        ->where('user_id',Auth::user()->id)
        ->update(['like'=>0]);
        ///////////////
        
        
         $like=DB::table('likes')
         ->where('post_id',$post_id)
         ->where('user_id',Auth::user()->id)
         ->first();
        
        if (!$like) {
            $newLike= new Like;
            $newLike->like=0;
            $newLike->post_id=$post_id;
            $newLike->user_id=Auth::user()->id;
            $newLike->save();
            $is_like=0;
        }
        elseif ($like->like==0) {
            DB::table('likes')
         ->where('post_id',$post_id)
         ->where('user_id',Auth::user()->id)
         ->delete();
         $is_like=1;
            
        }

         elseif ($like->like==1) {
            
               DB::table('likes')
         ->where('post_id',$post_id)
         ->where('user_id',Auth::user()->id)
         ->update(['like'=>0]);
          $change_dislike=1;
         $is_like=0;
          
            
        }
        $response=array(
            'is_like'=>$is_like,
            'change_dislike'=> $change_dislike,

            );
     return response($response,200);


    }



function stat()
{
    
    $user_Count=User::count();
    $post_Count=Post::count();
    $comment_Count=Comment::count();
    $like_Count=Like::count();
    $arr=array(
     'user_Count'=>$user_Count,
      'post_Count'=>$post_Count,
       'comment_Count'=>$comment_Count,
     'like_Count'=>$like_Count,
     

        );
  return view('content.stat',$arr);
}




public function deletPost($id)
{
   DB::table('posts')
   ->where('id',$id)
   ->delete();


    DB::table('likes')
   ->where('post_id',$id)
   ->delete();

    DB::table('comments')
   ->where('post_id',$id)
   ->delete();

   return back();
}


}

