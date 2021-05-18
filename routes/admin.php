<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//front page
Route::get('/', 'HomeController@main_pge')->name('main_page');

Route::get('logout', 'Admin\LoginController@logout')->name('logout');
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/home', 'Admin\HomeController@index')->name('home');
    Route::get('mail/incoming', 'Admin\MailController@incoming')->name('mail.incoming');
    Route::get('mail/outgoing', 'MailController@outgoing')->name('mail.outgoing');

    Route::group(['prefix' => "episode", 'namespace' => 'Admin\episodes'], function () {
        Route::get('index', 'EpisodeController@index')->name('episode.index');
        Route::post('update', 'EpisodeController@update')->name('episode.update');
        Route::post('place/teacher', 'EpisodeController@place_teacher')->name('episode.place.teacher');
        Route::post('place/students', 'EpisodeController@place_students')->name('episode.place.students');
        Route::post('place/teachers', 'EpisodeController@place_teachers')->name('episode.place.teachers');
        Route::get('details/{id}', 'EpisodeController@details')->name('episode.details');
        Route::get('zoom_settings/{id}', 'EpisodeController@zoom_settings')->name('episode.zoom_settings');

        Route::get('days/{id}', 'EpisodeController@episode_days')->name('episode.days');
        Route::post('week/store', 'EpisodeController@store_week')->name('week.store');

        Route::post('course_date/update', 'EpisodeController@update_course_date')->name('course_date.update');
        Route::post('course_date/store', 'EpisodeController@store_course_day')->name('course_date.store');
        Route::get('course_date/delete/{id}', 'EpisodeController@delete_course_day')->name('course_date.delete');

        Route::get('edit/{id}', 'EpisodeController@edit')->name('episode.edit');
        Route::get('index_create_mogmaa', 'EpisodeController@index_create_mogmaa')->name('episode.index_create_mogmaa');
//            Route::get('store', 'EpisodeController@store')->name('episode.store');
        Route::get('store_dorr/{type}', 'EpisodeController@store_dorr')->name('episode.store_dorr');
        Route::get('create', 'EpisodeController@create')->name('episode.create');
        Route::get('create_mqraa', 'EpisodeController@create_mqraa')->name('episode.create_mqraa');
        Route::get('create_dorr', 'EpisodeController@create_dorr')->name('episode.create_dorr');
        Route::get('delete/{id}', 'EpisodeController@destroy')->name('episode.delete');

        Route::get('conect_subject_plan', 'EpisodeController@conect_subject_plan')->name('episode.conect_subject_plan');
        Route::post('/conect_subject_plan/store', 'EpisodeController@store_plan_new')->name('conect_subject_plan.store');
        Route::post('/conect_subject_plan/update', 'EpisodeController@update_plan_new')->name('conect_subject_plan.update');
        Route::get('show_plan/{id}', 'EpisodeController@show_plan')->name('conect_subject_plan.show_plan');

        //ErrorType
        Route::get('ErrorType', 'ErrorTypeController@ErrorType_index')->name('ErrorType.index');
        Route::post('ErrorType', 'ErrorTypeController@ErrorType_store')->name('ErrorType.store');
        Route::post('ErrorType/update', 'ErrorTypeController@ErrorType_update')->name('ErrorType.update');
        Route::get('ErrorType/delete/{id}', 'ErrorTypeController@ErrorType_delete')->name('ErrorType.delete');



    });
    Route::post('episode/create/meetings/{id}', 'Zoom\MeetingController@web_create')->name('create.web.meeting');

    Route::get('episode/long_episodes', 'Admin\Mails\EpisodeMailController@long_episodes')->name('episode.long_episodes');

    //country
    Route::get('far_episode/ErrorType', 'Admin\episodes\ErrorTypeController@far_episode_ErrorType_index')->name('far_episode_ErrorType.index');
    Route::post('far_episode/ErrorType', 'Admin\episodes\ErrorTypeController@far_episode_ErrorType_store')->name('far_episode_ErrorType.store');
    Route::post('far_episode/ErrorType/update', 'Admin\episodes\ErrorTypeController@far_episode_ErrorType_update')->name('far_episode_ErrorType.update');
    Route::get('far_episode/ErrorType/delete/{id}', 'Admin\episodes\ErrorTypeController@far_episode_ErrorType_delete')->name('far_episode_ErrorType.delete');

    //restart epo
    Route::get('far_episode/restart/episode/requests', 'Admin\episodes\EpisodeController@restart_episode')->name('far_episode.restart.epo');
    Route::get('far_episode/restart_epo/change_status/{type}/{id}', 'Admin\episodes\EpisodeController@far_learn_restart_epo_change_status')->name('far_learn.restart.change_status');


    Route::get('far_episode/show/{id}', 'Admin\episodes\EpisodeController@show')->name('far_episode.show');
    Route::get('far_episode/join_request', 'Admin\episodes\EpisodeController@join_request')->name('far_episode.join_request');
    Route::get('far_episode/reject_join_request', 'Admin\episodes\EpisodeController@reject_join_request')->name('far_episode.reject_join_request');
    Route::get('far_episode/change_status/{type}/{id}', 'Admin\episodes\EpisodeController@far_learn_change_status')->name('far_learn.change_status');
    Route::get('dorr_episode/show/{id}', 'Admin\episodes\EpisodeController@show')->name('dorr_episode.show');
    Route::get('mogmaa_episode/show/{id}', 'Admin\episodes\EpisodeController@show')->name('mogmaa_episode.show');

    Route::group(['namespace' => 'Admin\episodes'], function () {
        Route::resource('colleges', 'CollegeController');
        Route::get('colleges/episodes', 'EpisodeController@episodes')->name('colleges.episodes');
    });

    Route::group(['namespace' => 'Admin\episodes'], function () {
        Route::resource('dorr', 'DorrController');
        Route::get('dorr/episodes', 'DorrController@episodes')->name('dorr.episodes');
    });

    Route::resource('episode_students', 'Admin\episodes\EpisodeStudentsController');

    Route::group(['prefix' => "settings/episodes", 'namespace' => 'Admin\Settings'], function () {
        Route::get('suar', 'EpisodeSettingsController@suar_index')->name('settings.episodes.suar');
        Route::post('suar', 'EpisodeSettingsController@suar_store')->name('settings.episodes.suar');
        Route::get('suar/delete/{id}', 'EpisodeSettingsController@suar_delete')->name('settings.episodes.suar.delete');
    });
    Route::group(['prefix' => "settings/sign_up", 'namespace' => 'Admin\Settings'], function () {
        //qualification
        Route::get('qualification', 'SignUpController@qualification_index')->name('qualification.index');
        Route::post('qualification', 'SignUpController@qualification_store')->name('qualification.store');
        Route::post('qualification/update', 'SignUpController@qualification_update')->name('qualification.update');
        Route::get('qualification/delete/{id}', 'SignUpController@qualification_delete')->name('qualification.delete');
        //nationality
        Route::get('nationality', 'SignUpController@nationality_index')->name('nationality.index');
        Route::post('nationality', 'SignUpController@nationality_store')->name('nationality.store');
        Route::post('nationality/update', 'SignUpController@nationality_update')->name('nationality.update');
        Route::get('nationality/delete/{id}', 'SignUpController@nationality_delete')->name('nationality.delete');
        //job_names
        Route::get('job_name', 'SignUpController@job_name_index')->name('job_name.index');
        Route::post('job_name', 'SignUpController@job_name_store')->name('job_name.store');
        Route::post('job_name/update', 'SignUpController@job_name_update')->name('job_name.update');
        Route::get('job_name/delete/{id}', 'SignUpController@job_name_delete')->name('job_name.delete');
        //country
        Route::get('country', 'SignUpController@country_index')->name('country.index');
        Route::post('country', 'SignUpController@country_store')->name('country.store');
        Route::post('country/update', 'SignUpController@country_update')->name('country.update');
        Route::get('country/delete/{id}', 'SignUpController@country_delete')->name('country.delete');
        //district
        Route::get('district', 'SignUpController@district_index')->name('district.index');
        Route::post('district', 'SignUpController@district_store')->name('district.store');
        Route::post('district/update', 'SignUpController@district_update')->name('district.update');
        Route::get('district/delete/{id}', 'SignUpController@district_delete')->name('district.delete');
    });
    Route::get('settings/messages', 'Admin\Settings\MessageSettingsController@index')->name('settings.messages');

    Route::get('get_subjects/{id}', 'Admin\episodes\EpisodeController@get_subjects');
    Route::get('get_subject_levels/{id}', 'Admin\episodes\EpisodeController@get_subject_levels');
    Route::get('get_subject_sign_up_levels/{id}', 'Admin\episodes\EpisodeController@get_subject_levels');

    Route::resource('levels', 'Admin\episodes\LevelController');
    Route::post('levels/update_new', 'Admin\episodes\LevelController@update')->name('levels.update_new');
    Route::post('levels/{id}/delete', 'Admin\episodes\LevelController@destroy');

    Route::resource('Academic_years', 'Admin\Academic_yearsController');
    Route::post('Academic_years/update_new', 'Admin\Academic_yearsController@update')->name('Academic_years.update_new');
    Route::get('Academic_years/{id}/delete', 'Admin\Academic_yearsController@destroy');

    Route::get('get_Academic_semesters/{id}', 'Admin\Academic_semestersController@get_Academic_semesters');
    Route::get('Academic_semester/{id}', 'Admin\Academic_semestersController@index');
    Route::resource('Academic_semester', 'Admin\Academic_semestersController');
    Route::post('Academic_semester/update_new', 'Admin\Academic_semestersController@update')->name('Academic_semester.update_new');
    Route::get('Academic_semester/{id}/delete', 'Admin\Academic_semestersController@destroy');

    Route::resource('subjects', 'Admin\episodes\SubjectController');
    Route::post('subjects/update_new', 'Admin\episodes\SubjectController@update')->name('subjects.update_new');
    Route::get('subjectss/{id}/delete', 'Admin\episodes\SubjectController@destroy')->name('subjectss.delete');

    Route::resource('subject_levels', 'Admin\episodes\SubjectLevelsController');
    Route::post('subject_levels/update_new', 'Admin\episodes\SubjectLevelsController@update')->name('subject_levels.update_new');
    Route::get('subjects_levels/{id}/delete', 'Admin\episodes\SubjectLevelsController@destroy')->name('subjects_levels.delete');

    Route::resource('subject_evaluation', 'Admin\episodes\SubjectEvaluationController');

    Route::resource('subject_levels_daily_plan', 'Admin\episodes\SubjectLevelDailyPlanController');
    Route::get('subject_levels_daily_plan/create_new/{sub_level_id}', 'Admin\episodes\SubjectLevelDailyPlanController@create')->name('subject_levels_daily_plan.create_new');

    Route::post('/plan/update', 'Admin\episodes\SubjectLevelDailyPlanController@update')->name('plan.update');
    Route::get('/plan/edit/{id}/{type}', 'Admin\episodes\SubjectLevelDailyPlanController@edit')->name('plan.edit');

    Route::post('/plan/new/store', 'Admin\episodes\SubjectLevelDailyPlanController@store_plan_new')->name('plan.new.store');

    Route::get('/plan/new/delete/{id}', 'Admin\episodes\SubjectLevelDailyPlanController@delete_new')->name('plan.new.delete');

    Route::post('/plan/tracomy/store', 'Admin\episodes\SubjectLevelDailyPlanController@store_plan_tracomy')->name('plan.tracomy.store');
    Route::get('/plan/tracomy/delete/{id}', 'Admin\episodes\SubjectLevelDailyPlanController@delete_tracomy')->name('plan.tracomy.delete');

    Route::post('/plan/revision/store', 'Admin\episodes\SubjectLevelDailyPlanController@store_plan_revision')->name('plan.revision.store');
    Route::get('/plan/revision/delete/{id}', 'Admin\episodes\SubjectLevelDailyPlanController@delete_revision')->name('plan.revision.delete');


    Route::get('profile', 'Admin\HomeController@profile')->name('profile');
    Route::get('change_pass', 'Admin\HomeController@profile')->name('change_pass');
    Route::post('/change_pass/update/password', 'Admin\HomeController@update_pass')->name('change_pass.update.pass');
    Route::post('/profile/update', 'Admin\HomeController@store_profile')->name('admin.store.profile');

    Route::resource('web_settings', 'Admin\web_settings\Web_SettingsController');
    Route::resource('sliders', 'Admin\web_settings\SlidersController');
    Route::get('sliders/{id}/delete', 'Admin\web_settings\SlidersController@destroy')->name('delete.slider');
    Route::post('sliders/update_new', 'Admin\web_settings\SlidersController@update_new')->name('sliders.update_new');

    Route::get('teacher_settings', 'Admin\Teachers\TeacherSettingsController@index');
    Route::get('teacher_settings/edit/{id}', 'Admin\Teachers\TeacherSettingsController@edit')->name('teacher_settings.edit');
    Route::get('teacher_settings/make_member/{id}', 'Admin\Teachers\TeacherSettingsController@make_member')->name('teacher_settings.make_member');
    Route::get('teacher_settings/study_teachers', 'Admin\Teachers\TeacherSettingsController@study_teachers')->name('teacher_settings.study_teachers');
    Route::post('teacher_settings/update/{id}', 'Admin\Teachers\TeacherSettingsController@update')->name('teacher_settings.update');
    Route::post('teacher_settings/store/new', 'Admin\Teachers\TeacherSettingsController@store')->name('store_new_teacher');
    Route::get('settings/join_orders_rejected', 'Admin\web_settings\Web_SettingsController@join_orders_rejected');

    Route::resource('blogs', 'Admin\web_settings\BlogsController');
    Route::get('blogs/{id}/delete', 'Admin\web_settings\BlogsController@destroy')->name('delete.blogs');

    Route::resource('contact_us', 'Admin\web_settings\Contact_usController');
    Route::get('contact_us/{id}/delete', 'Admin\web_settings\Contact_usController@destroy')->name('delete.contact_us');

    //users  routes
    Route::resource('users', 'Admin\UsersController');
    Route::get('users/{id}/delete', 'Admin\UsersController@destroy');
    Route::post('users/actived', 'Admin\UsersController@update_Actived')->name('users.actived');
    //user permissions and roles
    Route::resource('roles', 'Admin\roleController');
    // Route::post('/store_permission', 'Admin\roleController@store_permission')->name('store_permission');
    Route::get('/roles/edit/{id}', 'Admin\roleController@edit')->name('roles.edit');
    Route::post('/roles/update_permission/{id}', 'Admin\roleController@update')->name('roles.update_permission');
    Route::post('roles/store_permission', 'Admin\roleController@store_permission')->name('roles.store_permission');
    Route::get('/roles/destroy/{id}', 'Admin\roleController@destroy')->name('roles.destroy');

    //student routes in admin panel
    Route::get('student_settings', 'Admin\Students\StudentSettingsController@index');
    Route::post('student_settings/store/new', 'Admin\Students\StudentSettingsController@store')->name('store_new_student');

    Route::get('student_settings/{type}/show/{id}', 'Admin\Students\StudentSettingsController@details')->name('student.details');
    Route::get('student_settings/{type}', 'Admin\Students\StudentSettingsController@show');
    Route::get('student_episode/delete/{id}', 'Admin\Students\StudentSettingsController@destroy_student_epo')->name('student_episode.delete');
    Route::post('student_episode/change', 'Admin\Students\StudentSettingsController@change_student_epo')->name('student_episode.change');
    Route::get('student/change_epo_type/{id}', 'Admin\Students\StudentSettingsController@change_student_epo_type')->name('student_epo_type.change');
    Route::post('student/place/subject', 'Admin\Students\StudentSettingsController@update_subject_data')->name('student.place.subject');
    Route::post('student/place/episode', 'Admin\Students\StudentSettingsController@place_episode')->name('student.place.episode');
    Route::get('student_settings/{type}/edit/{id}', 'Admin\Students\StudentSettingsController@edit')->name('edit.student_settings');
    Route::post('student_settings/update', 'Admin\Students\StudentSettingsController@update')->name('update.student_settings');
    Route::group(['prefix' => "student", 'namespace' => "Admin\Students"], function ($router) {
        Route::get('new_join', 'StudentSettingsController@new_join')->name('student.new_join');
        Route::get('change_status/{id}', 'StudentSettingsController@change_status')->name('student.change_status');
        Route::get('accept/{id}', 'StudentSettingsController@accept')->name('student.accept');
        Route::get('reject/{id}', 'StudentSettingsController@reject')->name('student.reject');
    });

    //teacher routes in admin panel
    Route::group(['prefix' => "teacher", 'namespace' => "Admin\Teachers"], function ($router) {
        Route::get('new_join', 'TeacherSettingsController@new_join')->name('teacher.new_join');
        Route::get('change_status/{id}', 'TeacherSettingsController@change_status')->name('teacher.change_status');
        Route::get('accept/{id}', 'TeacherSettingsController@accept')->name('teacher.accept');
        Route::get('reject/{id}', 'TeacherSettingsController@reject')->name('teacher.reject');
    });
    //reports
    Route::group(['prefix' => "reports", 'namespace' => "Admin\Reports"], function ($router) {
        Route::get('data/mogmaa', 'Data\MogmaaController@index')->name('reports.mogmaa');
        Route::get('data/basic', 'Data\BasicController@index')->name('reports.basic');
    });
});
Route::get('/get_ayat_num/{id}', 'Admin\episodes\SubjectLevelDailyPlanController@get_ayat_num');
Route::get('lang/{lang}', function ($lang) {
    if (session()->has('lang')) {
        session()->forget('lang');
    }
    session()->put('lang', $lang);
    \App::setLocale($lang);
    return back();
});
?>

                                                                                                            
