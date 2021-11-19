<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::middleware(['middleware'=> 'PreventBackHistory'])->group(function(){
  	Auth::routes(['verify' => true]);
});
// Frontend Content Route------------------------------------------------------------------------------
Route::get('/', 'FrontendController@index');
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
// Auth Route
Route::get('/email/verify', 'Auth\VerificationController@emailVerify')->name('verification.notice');
Route::post('/email/verification-notification', 'Auth\VerificationController@emailVerificationNotification')->name('verification.send');
Route::get('/forgot-password','Auth\ForgotPasswordController@forgotPassword')->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@resetPassword')->middleware('guest')->name('password.reset');
Route::post('/reset-password', 'Auth\ResetPasswordController@resetPasswordUpdate')->middleware('guest')->name('password.update');
// all admin route
Route::group(['prefix'=>'admin', 'middleware'=>['auth','isAdmin', 'PreventBackHistory']], function(){
// admin deshboard route------------------------------------------------------------------------
    Route::get('/home', 'Admin\HomeController@index')->name('admin.deshbord');
// Health Topic Route---------------------------------------------------------------------------
    Route::get('/all-health-topic', 'HealthTopicController@index')->name('admin.all-health-topic');
    Route::get('/add-health-topic', 'HealthTopicController@add_health_topic')->name('admin.add-health-topic');
    Route::post('/store-health-topic', 'HealthTopicController@store_health_topic')->name('admin.store-health-topic');
    Route::get('/edit-health-topic/{id}', 'HealthTopicController@edit_health_topic')->name('admin.edit-health-topic');
    Route::post('/update-health-topic/{id}', 'HealthTopicController@update_health_topic')->name('admin.update-health-topic');
    Route::get('/delete-health-topic/{id}', 'HealthTopicController@delete_health_topic')->name('admin.delete-health-topic');
    Route::get('/active-health-topic/{id}', 'HealthTopicController@active_health_topic')->name('admin.active-health-topic');
    Route::get('/deactive-health-topic/{id}', 'HealthTopicController@deactive_health_topic')->name('admin.deactive-health-topic');
// Health Speech Route--------------------------------------------------------------------------
    Route::get('/all-health-speech', 'HealthSpeechController@index')->name('admin.all-health-speech');
    Route::get('/add-health-speech', 'HealthSpeechController@add_health_speech')->name('admin.add-health-speech');
    Route::post('/store-health-speech', 'HealthSpeechController@store_health_speech')->name('admin.store-health-speech');
    Route::get('/edit-health-speech/{id}', 'HealthSpeechController@edit_health_speech')->name('admin.edit-health-speech');
    Route::post('/update-health-speech/{id}', 'HealthSpeechController@update_health_speech')->name('admin.update-health-speech');
    Route::get('/delete-health-speech/{id}', 'HealthSpeechController@delete_health_speech')->name('admin.delete-health-speech');
    Route::get('/active-health-speech/{id}', 'HealthSpeechController@active_health_speech')->name('admin.active-health-speech');
    Route::get('/deactive-health-speech/{id}', 'HealthSpeechController@deactive_health_speech')->name('admin.deactive-health-speech');
    Route::get('/details-health-speech/{id}', 'HealthSpeechController@details_health_speech')->name('admin.details-health-speech');
    Route::get('/section-health-speech/{id}', 'HealthSpeechController@section_health_speech')->name('admin.section-health-speech');
//Sub Health Speech Route----------------------------------------------------------------------
    Route::get('/all-sub-health-speech', 'SubHealthSpeechController@index')->name('admin.all-sub-health-speech');
    Route::get('/add-sub-health-speech/{id}', 'SubHealthSpeechController@add_sub_hs')->name('admin.add-sub-health-speech');
    Route::post('/store-sub-health-speech/{id}', 'SubHealthSpeechController@store_sub_hs')->name('admin.store-sub-health-speech');
    Route::get('/edit-sub-health-speech/{id}', 'SubHealthSpeechController@edit_sub_hs')->name('admin.edit-sub-health-speech');
    Route::post('/update-sub-health-speech/{id}', 'SubHealthSpeechController@update_sub_hs')->name('admin.update-sub-health-speech');
    Route::get('/delete-sub-health-speech/{id}', 'SubHealthSpeechController@delete_sub_hs')->name('admin.delete-sub-health-speech');
    Route::get('/active-sub-health-speech/{id}', 'SubHealthSpeechController@active_sub_hs')->name('admin.active-sub-health-speech');
    Route::get('/details-sub-health-speech/{id}', 'SubHealthSpeechController@details_sub_hs')->name('admin.details-sub-health-speech');
    Route::get('/deactive-sub-health-speech/{id}', 'SubHealthSpeechController@deactive_sub_hs')->name('admin.deactive-sub-health-speech');
    Route::get('/section-sub-health-speech/{id}', 'SubHealthSpeechController@section_sub_health_speech')->name('admin.section-sub-health-speech');
//Sub Sub Health Speech Route-------------------------------------------------------------------
    Route::get('/all-sub-sub-hs', 'SubSubHSController@index')->name('admin.all-sub-sub-hs');
    Route::get('/add-sub-sub-hs/{id}', 'SubSubHSController@add_sub_sub_hs')->name('admin.add-sub-sub-hs');
    Route::post('/store-sub-sub-hs/{id}', 'SubSubHSController@store_sub_sub_hs')->name('admin.store-sub-sub-hs');
    Route::get('/edit-sub-sub-hs/{id}', 'SubSubHSController@edit_sub_sub_hs')->name('admin.edit-sub-sub-hs');
    Route::post('/update-sub-sub-hs/{id}', 'SubSubHSController@update_sub_sub_hs')->name('admin.update-sub-sub-hs');
    Route::get('/delete-sub-sub-hs/{id}', 'SubSubHSController@delete_sub_sub_hs')->name('admin.delete-sub-sub-hs');
    Route::get('/active-sub-sub-hs/{id}', 'SubSubHSController@active_sub_sub_hs')->name('admin.active-sub-sub-hs');
    Route::get('/deactive-sub-sub-hs/{id}', 'SubSubHSController@deactive_sub_sub_hs')->name('admin.deactive-sub-sub-hs');
    Route::get('/details-sub-sub-hs/{id}', 'SubSubHSController@details_sub_sub_hs')->name('admin.details-sub-sub-hs');
    Route::get('/section-sub-sub-hs/{id}', 'SubSubHSController@section_sub_health_speech')->name('admin.section-sub-sub-hs');
// user and subcriber list route----------------------------------------------------------------
    Route::get('all-subscribe', 'SubscriberController@all_subscribe')->name('admin.all-subscribe');
    Route::get('user-list', 'PatientController@user_list')->name('admin.user-list');
});
//Blog items Health Speech Route-------------------------------------------------------------------
Route::get('/blog-list', 'BlogController@index');
Route::get('/article/{slug}', 'BlogController@blog_details');
// Route::get('/{slug}', 'BlogController@blog_details');
Route::post('feedback_store', 'FeedbackController@store');
Route::get('shareSocial', 'ShareSocialController@shareSocial');
//User question and anser Route----------------------------------------------------------------------
Route::get('/aske-question', 'QuestionController@aske_question');
Route::post('question-store', 'QuestionController@question_store');
Route::get('more-view-question', 'QuestionController@index');
Route::post('load-more-question', 'QuestionController@load_more_question')->name('load-more-question');
Route::get('see-anser-question/{id}', 'QuestionController@see_anser_question');
Route::post('question-comment-store', 'QuestionCommentController@question_comment');
Route::post('reply-question-comment-store', 'ReplyCommentQuestionController@reply_comment_store');
// User Profile Route------------------------------------------------------------------------------
Route::get('my-profile', 'PatientController@index')->name('user.my-profile');
Route::post('user_bio', 'PatientController@user_bio');
Route::get('my-account', 'PatientController@my_account');
Route::get('my-question', 'PatientController@my_question');
Route::post('user-picture-update', 'PatientController@user_picture');
Route::get('user-about-update', 'PatientController@user_about');
Route::post('user-about-store', 'PatientController@user_about_store');
Route::post('change-name-password', 'PatientController@change_name_password');
Route::get('user-profile-view/{id}', "PatientController@user_profile_view");
Route::post('follower-create', "FollowerController@follower_create");
Route::post('new-subscriber', 'SubscriberController@new_subscriber');
// Comment Route -------------------------------------------------------------------------------------
Route::post('post-comment', 'CommentController@comment');
Route::post('reply-comment-store', 'ReplyCommentController@reply_comment_store');
// Like and Dislike --------------------------------------------------------------------------------
Route::post('store-like_dislike', 'LikedislikeController@likedislike_store');
// Footer Route----------------------------------------------------------------------------------------
Route::get('abotu-us', 'FooterController@about_us');
Route::get('contact-us', 'FooterController@contact_us');
Route::post('/contact', 'ContactController@ContactUsForm')->name('contact.store');
Route::get('privacy-policy', 'FooterController@privacy_policy');
Route::get('terms-condition', 'FooterController@terms_condition');
Route::get('advisment', 'FooterController@advisment');
Route::get('write-us', 'FooterController@write_us');
Route::get('health-topics', 'FooterController@health_topics');
Route::get('all-health-topics', 'HealthTopicController@all_health_topic')->name('all-health-topics');
Route::get('article-categories/{slug}', 'HealthTopicController@blog_list_by_topic')->name('article-categories');
// sitemap route ---------------------------------------------------------------
Route::get('/sitemap.xml', 'SitemapXmlController@index')->name('sitemap.xml');