<?php

use Illuminate\Support\Facades\Route;

//front page
Route::get('/', 'HomeController@main_pge')->name('main_page');
Route::get('/teacher/logout', 'Teacher\HomeController@logout')->name('teacher_logout');

Route::group(['middleware' => ['teacher'], 'prefix' => "teacher", 'namespace' => "Teacher"], function () {
    Route::get('home', 'HomeController@index')->name('teacher.home');

    // profile
    Route::get('profile', 'HomeController@profile')->name('teacher.profile');
    Route::post('/profile', 'HomeController@update_profile')->name('teacher.profile');
    Route::get('/change_pass', 'HomeController@change_pass')->name('teacher.change_pass');
    Route::post('change_pass', 'HomeController@ChangePasswordTeacher')->name('teacher.store.change_pass');

    // episodes
    Route::resource('t_episodes', 'episodes\EpisodeController');
    Route::post('stud/make_come', 'episodes\EpisodeController@make_come');
    Route::post('t_episodes/make_link_all', 'episodes\EpisodeController@make_link_all');
    Route::post('t_episodes/restart', 'episodes\EpisodeController@restart_episode')->name('t_episode.epo.restart');
    Route::get('t_episodes/update_link/{id}', 'episodes\EpisodeController@update_link')->name('t_episodes.update_link');
    Route::get('t_episodes/end_epo/{section_id}', 'episodes\EpisodeController@end_epo')->name('teacher.epo.end');
    Route::get('t_episodes/page/blank', 'episodes\EpisodeController@blank_page')->name('teacher.epo.blank_page');

    Route::post('t_episodes/make_evaluate', 'episodes\EpisodeController@make_evaluate')->name('t_episodes.make_evaluate');
    Route::post('t_episodes/make_far_learn_evaluate', 'episodes\EpisodeController@make_far_learn_evaluate')->name('t_episodes.make_far_learn_evaluate');
    Route::get('t_episodes/delete_evaluate/{id}', 'episodes\EpisodeController@delete_evaluate')->name('t_episodes.delete_evaluate');
    Route::get('/t_episodes/student/details/{id}/{episode_id}', 'episodes\EpisodeController@get_student_info')->name('t_episode.student_info');
    Route::get('/t_episodes/students/{epo_id}', 'episodes\EpisodeController@epo_students')->name('teacher.epo.students');
    Route::get('/t_episodes/students/degrees/{stud_id}/{epo_id}', 'episodes\EpisodeController@epo_student_degrees')->name('teacher.epo.student.degrees');
//    Route::get('/t_episodes/zoom/{id}/index', 'episodes\EpisodeController@zoom')->name('t_episode.zoom');
//    Route::get('/t_episodes/zoom/meeting', 'episodes\EpisodeController@zoom_meeting')->name('teacher.zoom_meeting');
    Route::post('/t_episodes/edit_link', 'episodes\EpisodeController@edit_link')->name('t_episode.edit_link');


    Route::get('/t_episodes/plan/degree/{type}/{student_id}/{plan_id}/{section_id}/{total}/{subject_id}', 'episodes\EpisodeController@give_degree')->name('t_episodes.plan.degree');
    Route::get('/teacher/new_epo', 'episodes\EpisodeController@new_epo')->name('teacher.new_epo');
    Route::get('/teacher/episode/next_turn/{section_id}', 'episodes\EpisodeController@next_turn')->name('t_episode.next_turn');


});



