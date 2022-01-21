<?php

use Illuminate\Support\Facades\Route;

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




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' =>'App\Http\Controllers'], function(){
    Route::get('/', 'FrontendController@index' );

    Route::resource('user', 'UserProfileController');
    
    Route::prefix('/admin')->group(function(){
        Route::match(['get', 'post'],'/login', 'AdminLoginController@adminLogin')->name('adminLogin');
        Route::get('/registerUser', 'AdminLoginController@registerUser')->name('registerUser');
        Route::match(['get', 'post'],'/forget_password', 'AdminLoginController@forgetPassword')->name('forgetPassword');  


        Route::group(['middleware' => 'admin'], function(){
            Route::get('/dashboard', 'AdminLoginController@adminDashboard')->name('adminDashboard'); 
            Route::get('/user_profile', 'UserProfileController@userProfile')->name('userProfile');  
            Route::post('/update_profile', 'UserProfileController@updateProfile')->name('updateProfile');  
            //change password
            Route::get('/change_password', 'UserProfileController@changePassword')->name('changePassword');   
            
            //check current password
            Route::post('/check_password', 'UserProfileController@checkCurrentPassword')->name('checkCurrentPassword');  
            
            //update password
            Route::post('/update_password', 'UserProfileController@updatePassword')->name('updatePassword');  

            // setting module
            Route::get('/setting', 'SettingController@index')->name('setting_index');  
            Route::get('/setting/form', 'SettingController@create')->name('setting_create');  
            Route::post('/setting', 'SettingController@store')->name('setting_store');  

            //banner module       
            Route::get('/banner/form', 'BannerController@create')->name('banner_form'); 
            Route::get('/banner/edit/{id}', 'BannerController@edit_banner')->name('edit_banner');
            Route::get('/banner', 'BannerController@index')->name('banner_index');
            Route::post('/banner/store', 'BannerController@store')->name('banner_store');            
            Route::post('/banner/update/{id}', 'BannerController@update_banner')->name('update_banner');
            Route::get('/banner/delete/{id}', 'BannerController@delete_banner')->name('delete_banner');


            //about module       
            Route::get('/about/form', 'AboutController@create')->name('about_form');
            Route::get('/about', 'AboutController@index')->name('about_index');
            Route::post('/about/store', 'AboutController@store')->name('about_store');
            Route::post('/about/update/{id}', 'AboutController@update')->name('about_update');

            //feature module       
            Route::get('/feature/form', 'FeatureController@create')->name('feature_form');
            Route::get('/feature/edit/{id}', 'FeatureController@edit_feature')->name('edit_feature');
            Route::get('/feature', 'FeatureController@index')->name('feature_index');
            Route::post('/feature/store', 'FeatureController@store')->name('feature_store');
            Route::post('/feature/update/{id}', 'FeatureController@update_feature')->name('update_feature');
            Route::get('/feature/delete/{id}', 'FeatureController@delete_feature')->name('delete_feature');

            //skill module       
            Route::get('/skill', 'SkillController@index')->name('skill_index');
            Route::get('/skill/edit/{id}', 'SkillController@edit_skill')->name('edit_skill');
            Route::get('/skill/form', 'SkillController@create')->name('skill_form');
            Route::post('/skill/store', 'SkillController@store')->name('skill_store');            
            Route::post('/skill/update/{id}', 'SkillController@update_skill')->name('update_skill');
            Route::get('/skill/delete/{id}', 'SkillController@delete_skill')->name('delete_skill');


            //team module       
            Route::get('/team', 'TeamController@index')->name('member_index');
            Route::get('/team/member/edit/{id}', 'TeamController@edit_member')->name('edit_member');
            Route::get('/team/member_form', 'TeamController@create')->name('member_form');
            Route::post('/team/member_store', 'TeamController@store')->name('member_store');
            Route::post('/team/member/update/{id}', 'TeamController@update_member')->name('update_member');
            Route::get('/team/member/delete/{id}', 'TeamController@delete_member')->name('delete_member');

            //client module       
            Route::get('/client', 'clientController@index')->name('client_index');
            Route::get('/client/form', 'clientController@create')->name('client_form');
            Route::post('/client/store', 'clientController@store')->name('client_store');
            Route::get('/client/edit/{id}', 'clientController@edit_client')->name('edit_client');
            Route::post('/client/update/{id}', 'clientController@update_client')->name('update_client');
            Route::get('/client/delete/{id}', 'clientController@delete_client')->name('delete_client');

             //service module       
             Route::get('/service', 'ServiceController@index')->name('service_index');
             Route::get('/service/form', 'ServiceController@create')->name('service_form');
             Route::post('/service/store', 'ServiceController@store')->name('service_store');
             Route::get('/service/edit/{id}', 'ServiceController@edit_service')->name('edit_service');
             Route::post('/service/update/{id}', 'ServiceController@update_service')->name('update_service');
             Route::get('/service/delete/{id}', 'ServiceController@delete_service')->name('delete_service');
 

              //gallery module       
              Route::get('/gallery', 'GalleryController@index')->name('gallery_index');
              Route::get('/gallery/form', 'GalleryController@create')->name('gallery_form');
              Route::post('/gallery/store', 'GalleryController@store')->name('gallery_store');
              Route::get('/gallery/delete/{id}', 'GalleryController@delete_gallery')->name('delete_gallery');
              
        });

        Route::get('/logout', 'AdminLoginController@adminLogout')->name('adminLogout'); 

    });
});
