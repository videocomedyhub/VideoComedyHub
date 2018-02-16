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

Route::get('/', 'IndexController@index')->name('index');

// search result
Route::get('search', 'IndexController@search')->name('search');


Route::get('tag/{slug}', 'IndexController@search')->name('tags.single');

// channels
Route::prefix('channels')->group(function () {
    Route::get('/', 'ChannelController@index')->name('channels');
    Route::get('videos', 'ChannelController@videoList')->name('channels.videos');
});
Route::get('channel/{slug}', 'ChannelController@single')->name('channels.single');
Route::get('channel/{channelId}', 'ChannelController@singleById')->name('channels.singleById');


// videos
Route::prefix('videos')->group(function () {
    Route::get('/', 'VideoController@index')->name('videos');
    Route::get('popular', 'VideoController@popular')->name('videos.popular');
    Route::get('new', 'VideoController@newVideos')->name('videos.new');
});
Route::get('watch/{videoId}', 'VideoController@watch')->name('videos.watch');
Route::get('video/{slug}', 'VideoController@single')->name('videos.single');
Route::redirect('/video', '/videos', 301);


// categories
Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::get('featured', 'CategoryController@featured')->name('categories.featured');
});
Route::get('category/{slug}', 'CategoryController@single')->name('categories.single');

// SiteMap
Route::get('/sitemap.xml', 'SiteMapController@index');
Route::prefix('sitemap')->group(function () {
    Route::get('/', 'SiteMapController@index')->name('sitemap');
    Route::get('/videos', 'SiteMapController@videos')->name('sitemap.videos');
    Route::get('/videos/{page}', 'SiteMapController@videoList')->name('sitemap.videos.single');
    Route::get('/channels', 'SiteMapController@channels')->name('sitemap.channels');
    Route::get('/channels/{page}', 'SiteMapController@channelList')->name('sitemap.channels.single');
    Route::get('/categories', 'SiteMapController@categories')->name('sitemap.categories');
    Route::get('/tags', 'SiteMapController@tags')->name('sitemap.tags');
    Route::get('/posts', 'SiteMapController@posts')->name('sitemap.posts');
    Route::get('/pages', 'SiteMapController@pages')->name('sitemap.pages');
});


Auth::routes();
// Socialite Routes
Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('social.login')->where('provider', 'facebook|twitter|google|linkedin');
Route::get('login/{provider}/response', 'LoginController@handleProviderCallback')->where('provider', 'facebook|twitter|google|linkedin');
// external logout
Route::get('logout', 'Auth\LoginController@logout');// logout should be handled with POST request

Route::get('home', 'HomeController@index')->name('home');

Route::get('user/{username}/about', 'HomeController@index')->name('user.about');
Route::get('user/{username}/favourite', 'HomeController@favourite')->name('user.favourite');
Route::get('user/{username}/saved', 'HomeController@saved')->name('user.saved');
Route::get('user/{username}/watched', 'HomeController@watched')->name('user.watched');
Route::post('favourite', 'HomeController@favorite')->name('favourite');


Route::get('blog', 'IndexController@index')->name('blogs');
Route::get('contact-us', 'IndexController@index')->name('about-us');
Route::get('about', 'IndexController@index')->name('contact-us');

Route::get('test', 'IndexController@test')->name('test');


Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminDashBoardController@index')->name('admin.dashboard');
    
    // Videos
    Route::get('videos', 'Admin\AdminVideoController@index')->name('admin.videos');
    Route::get('videos/import', 'Admin\AdminVideoController@import')->name('admin.videos.import');
    Route::post('videos/import', 'Admin\AdminVideoController@postImport')->name('admin.videos.import');
    
    // Categories
    Route::get('categories', 'Admin\AdminCategoryController@index')->name('admin.categories');
    Route::get('categories/new', 'Admin\AdminCategoryController@newCategory')->name('admin.categories.new');
    Route::post('categories/new', 'Admin\AdminCategoryController@store');
    
    // Channels
    Route::get('channels', 'Admin\AdminChannelController@index')->name('admin.channels');
    Route::get('channels/new', 'Admin\AdminChannelController@newChannel')->name('admin.channels.new');
    Route::post('channels/new', 'Admin\AdminChannelController@postNew');
    Route::post('channels/grab', 'Admin\AdminChannelController@grabVideos')->name('admin.channels.grab');
});