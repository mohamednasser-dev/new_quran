<?php

use Illuminate\Support\Facades\Route;

//front page
Route::get('/', 'HomeController@main_pge')->name('main_page');
Route::get('/student/logout', 'Student\HomeController@logout')->name('student_logout');
Route::group(['middleware' => ['student'], 'prefix' => "student", 'namespace' => "Student"], function () {
    Route::get('home', 'HomeController@index')->name('student_home');
    Route::resource('search', 'SearchController');
    Route::post('/search/episodes', 'SearchController@store')->name('search.episodes');
    Route::get('/search/episode/join/{episode_id}', 'SearchController@join')->name('episode.join');
    Route::get('/search/episode/leave/{episode_id}', 'SearchController@leave')->name('episode.leave');
    Route::get('/my_episodes', 'EpisodeController@my_episodes')->name('student.my_episodes');
    Route::get('/my_episodes/degrees/{id}', 'EpisodeController@my_episode_degrees')->name('student.my_episode.degree');
    Route::get('/my_episodes/{id}', 'EpisodeController@show')->name('student_episodes.show');

    Route::get('/profile', 'HomeController@profile')->name('student.profile');
    Route::post('/profile', 'HomeController@update_profile')->name('student.profile');
    Route::get('/change_pass', 'HomeController@change_pass')->name('student.change_pass');
    Route::get('/profile/get_subjects/{id}', 'EpisodeController@get_subjects');
    Route::get('/profile/get_subject_levels/{id}', 'EpisodeController@get_subject_levels');
    Route::post('Store_Student_Question_episode', 'EpisodeController@Store_Student_Question_episode');

    Route::post('ChangePasswordStudent', 'HomeController@ChangePasswordStudent')->name('ChangePasswordStudent');
    Route::post('make_rate', 'EpisodeController@make_rate')->name('student.make_rate');
});



