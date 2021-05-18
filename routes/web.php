<?php

use Illuminate\Support\Facades\Route;

// all type of users have appelety to view all this routes ..

//front page
Route::get('/', 'HomeController@main_pge')->name('main_page');
Route::get('/teaching_members', 'HomeController@teaching_members')->name('front.teaching_members');

Route::get('/verify_email', 'Admin\LoginController@verify_email')->name('verify_email');
Route::post('/verify_account', 'Admin\LoginController@verify_account')->name('verify_account');
Route::post('/resend_verify', 'Admin\LoginController@resend_verify')->name('resend.verify.email');
Route::post('/teacher_verify_account', 'Admin\LoginController@teacher_verify_account')->name('teacher_verify_account');

Route::get('/Forget-password', 'Admin\LoginController@Forgetpassword')->name('Forget-password');

//multi login routes
Route::post('/login_user', 'Admin\LoginController@login')->name('login_user');
Route::get('/get_subject_sign_up_levels/{id}', 'Front\EpisodesController@get_subject_levels');
Route::get('/{type?}/sign_up', 'Admin\LoginController@sign_up')->name('sign_up');
Route::post('/{type?}/store', 'Admin\LoginController@store')->name('store.new');
Route::post('/login_both', 'Admin\LoginController@login_both')->name('login_both');

Route::post('/contact_us/store_new', 'Front\Contact_usController@store')->name('contact_us.store_new');

//parent routes
Route::get('/{student_id?}/student_parent', 'Admin\LoginController@student_parent')->name('student_parent');
Route::post('/store_parent', 'Admin\LoginController@store_parent')->name('store.parent');

//search
Route::resource('search_guest', 'Front\SearchController');

Route::resource('times', 'Front\EpisodesController');
Route::get('show_mix/{type}', 'Front\EpisodesController@show_mix')->name('front.show_mix');
Route::post('/times/search/episodes', 'Front\EpisodesController@search')->name('times.search.episodes');
Route::get('times/search/episodes/teacher/details/{id}', 'Front\EpisodesController@teacher_details')->name('front.teacher_details');


Route::get('/check', function () {
    Artisan::call('notification:send');
});
Route::get('sendEmail', 'Student\HomeController@sendEmail')->name('sendEmail');

Route::post('reset_password_with_token', 'HomeController@resetPassword')->name('reset_password_with_token');
Route::post('changePasswordForRest', 'HomeController@changePasswordForRest')->name('changePasswordForRest');


Route::get('/teacher/t_episodes/zoom/{id}/index', 'Teacher\episodes\EpisodeController@zoom')->name('t_episode.zoom');
Route::get('/teacher/t_episodes/zoom/meeting', 'Teacher\episodes\EpisodeController@zoom_meeting')->name('teacher.zoom_meeting');

Auth::routes();




