<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'pagesController@Posts');
Route::get('/post','pagesController@Posts' );

Route::get('/post/{id}','pagesController@Post' );

Route::post('/addpost','pagesController@addpost' );
Route::post('/store/{id}',
  ['uses'=>'CommentController@store',
    'middleware'=>'roles',
    'roles'=>['user','admin','editor']


  ]


    );

Route::post('/regester','UserController@store');

Route::post('/login','SessionController@login');
Route::get('/logout','SessionController@logout');

Route::get('/category/{name}','pagesController@category' );
Route::get('/stat','pagesController@stat');

Route::get('/admin',[
     
     'uses'=>'pagesController@admin',
     'middleware'=>'roles',
     'roles'=>['admin']

	]

	 );

Route::post('/add_role',[
     
     'uses'=>'pagesController@add_role',
     'middleware'=>'roles',
     'roles'=>['admin']

    ]

     );

Route::get('/editor',[
     
     'uses'=>'pagesController@editor',
     'middleware'=>'roles',
     'roles'=>['admin','editor']

	]

	 );

Route::get('/deletPost/{id}','pagesController@deletPost' );



Route::group(['middleware'=>'roles','roles'=>['user','admin','editor']],function()

{  
        Route::post('/like','pagesController@like')->name('like');
        Route::post('/dislike','pagesController@dislike')->name('dislike');
        Route::get('/profile','UserController@profile');
        

        Route::get('/setting','UserController@setting');
         Route::post('/editProfile','UserController@editProfile');

        
    });
