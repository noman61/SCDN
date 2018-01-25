<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/messi', function ()    {
        // Uses Auth Middleware
        return "Hello World!";
    });
    Route::get('/admin', function () {
    return view('home');
 });
    Route::get('/admin/gallery','adminController@gallery');
    Route::get('/admin/gallery/add',function(){
         return view('admin.gallery_add');
    });
    Route::post('/admin/gallery/add','adminController@gallery_add');
    Route::get('/admin/gallery/update/{id}','adminController@gallery_update_first');
    Route::post('/admin/gallery/update/{id}','adminController@gallery_update_second');
    Route::get('/admin/gallery/delete/{id}','adminController@gallery_delete');

    Route::get('/admin/developer_list','adminController@developer_list');
    Route::get('/admin/developer/add',function(){
         return view('admin.developer_add');
    });
   Route::post('/admin/developer/add','adminController@developer_add');
   
   Route::get('admin/announcement','adminController@announcement');
   Route::get('/admin/announcement/add',function(){
         return view('admin.announcement_add');
    });  
   Route::post('admin/announcement/add','adminController@announcement_add');
   Route::get('admin/announcement/update/{id}','adminController@announcement_update_first');
   Route::post('admin/announcement/update/{id}','adminController@announcement_update_second');
   Route::get('admin/announcement/delete/{id}','adminController@announcement_delete');

   Route::get('/admin/blog','adminController@blog');
   Route::get('/admin/blog/add',function(){
     return view('admin.blog_add');
   });
   Route::post('/admin/blog/add','adminController@blog_add');
   Route::get('/admin/blog/update/{id}','adminController@blog_update_first');
   Route::post('/admin/blog/update/{id}','adminController@blog_update_second');
   Route::get('/admin/blog/delete/{id}','adminController@blog_delete');
   Route::get('/api/author',function(){
return App\developer::where('name','LIKE','%'.request('q').'%')->paginate(10);
});
      Route::get('/api/tag',function(){
return App\tag::where('name','LIKE','%'.request('q').'%')->paginate(10);
});

Route::get('/admin/award','adminController@award');
Route::get('/admin/award/add',function(){
    return View('admin.award_add');
});
Route::post('/admin/award/add','adminController@award_add');

Route::get('/admin/tag','adminController@tag');
   Route::get('/admin/tag/add',function(){
     return view('admin.tag_add');
   });
   Route::post('/admin/tag/add','adminController@tag_add');
   Route::get('/admin/tag/update/{id}','adminController@tag_update_first');
   Route::post('/admin/tag/update/{id}','adminController@tag_update_second');
   Route::get('/admin/tag/delete/{id}','adminController@tag_delete');

});

Route::get('/gallery','galleryController@index');

Route::get('/developer_list','developerController@index');
Route::get('/developer_list/specific/{id}','developerController@specific');
Route::get('/announcement','announcementController@index');
Route::get('/announcement/{id}','announcementController@specific');

Route::get('/home', 'HomeController@index');

Route::get('/blog','blogController@index');
Route::get('/blog/{id}','blogController@specific');
Route::get('/blog/tag/{id}','blogController@specific_tag');
Route::get('/btest',function(){
    return view('blog_test');
});

Route::get('/award','awardController@index');
