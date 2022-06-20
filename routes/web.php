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

// Index Page
Route::get('', 'IndexController@index')->name('index');
Route::get('/gallery', 'FrontendController@gallery')->name('gallery');
Route::get('/contactUs', 'FrontendController@contactUs')->name('contactUs');
Route::get('/team', 'FrontendController@team')->name('team');
Route::get('/pdf-listing', 'FrontendController@pdfListing')->name('pdfListing');
Route::get('/member-listing/central', 'FrontendController@memberListing')->name('memberListing');
Route::get('/member-listing/province', 'FrontendController@provinceMemberListing')->name('provinceMemberListing');
//Members-Details
Route::get('/member-details/{id}', 'FrontendController@memberDetails')->name('memberDetails');
Route::get('/single-page', 'FrontendController@singlePage')->name('singlePage');

Route::get('/blog', 'FrontendController@blog')->name('blog');
//Blog Details
Route::get('/blog-details/{id}', 'FrontendController@blogDetails')->name('blogDetails');
//search
Route::get('/search', 'FrontendController@search')->name('search');
//about page
Route::get('/aboutus', 'FrontendController@aboutPage')->name('aboutPage');
//policies
Route::get('/policies', 'FrontendController@policies')->name('policies');

//objective
Route::get('/objective', 'FrontendController@objective')->name('objective');

//legislation
Route::get('/legislation', 'FrontendController@legislation')->name('legislation');

//comment
Route::post('/comment/store', 'CommentController@storeComment')->name('storeComment');


Route::prefix('/admin')->group(function (){
Route::match(['get','post'], '/login', 'AdminLoginController@adminLogin')->name('adminLogin');
Route::group(['middleware'=>['admin']],function (){
Route::get('/dashboard', 'AdminLoginController@dashboard')->name('adminDashboard');
//Admin Profile
Route::get('/profile', 'AdminProfileController@profile')->name('profile');
//Admin Update
Route::post('/profile/update/{id}', 'AdminProfileController@updateProfile')->name('updateProfile');
//Change Password
Route::get('/profile/change_password', 'AdminProfileController@changePassword')->name('changePassword');

//Check current Password
Route::post('/profile/check-password','AdminProfileController@chkUserPassword')->name('chkUserPassword');
//Update Admin password
Route::post('/profile/update_password/{id}', 'AdminProfileController@updatePassword')->name('updatePassword');

//User
Route::get('/user', 'UserController@index')->name('user.index');
Route::post('/user/store', 'UserController@storeUser')->name('storeUser');
Route::get('/user/delete/{id}', 'UserController@deleteUser')->name('deleteUser');


//Theme
Route::get('/theme', 'ThemeController@theme')->name('theme');
Route::post('/theme/update_theme/{id}', 'ThemeController@updateTheme')->name('updateTheme');
//Site
Route::get('/informationSetting', 'SiteController@site')->name('site');
Route::post('/site/update_informationSetting/{id}', 'SiteController@updateSite')->name('updateSite');
Route::get('/seoSetting', 'SiteController@siteSeo')->name('siteSeo');
Route::post('/site/update_seoSetting/{id}', 'SiteController@updateSeo')->name('updateSeo');
Route::get('/site/socialmediaSetting', 'SiteController@socialmedia')->name('socialmedia');
Route::post('/site/update_socialmediaSetting/{id}', 'SiteController@updateSocialmedia')->name('updateSocialmedia');

//Members
Route::get('/member', 'MemberController@index')->name('member.index');
Route::get('/member/add', 'MemberController@addMember')->name('addMember');
Route::post('/member/store', 'MemberController@storeMember')->name('storeMember');
Route::get('/member/edit/{id}', 'MemberController@editMember')->name('editMember');
Route::post('/member/update/{id}', 'MemberController@updateMember')->name('updateMember');
Route::get('/member/delete/{id}', 'MemberController@deleteMember')->name('deleteMember');



//Pdf
Route::get('/pdf', 'PdfListingController@index')->name('pdf.index');
Route::get('/pdf/add', 'PdfListingController@addPdf')->name('addPdf');
Route::post('/pdf/store', 'PdfListingController@storePdf')->name('storePdf');
Route::get('download/pdf/{pdf}', 'PdfListingController@downloadFile')->name('downloadPdf');
Route::get('/pdf/delete/{id}', 'PdfListingController@deletePdf')->name('deletePdf');

//Blog  
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/add', 'BlogController@addBlog')->name('addBlog');
Route::post('/blog/store', 'BlogController@storeBlog')->name('storeBlog');
Route::get('/blog/edit/{id}', 'BlogController@editBlog')->name('editBlog');
Route::post('/blog/update/{id}', 'BlogController@updateBlog')->name('updateBlog');
Route::get('/blog/delete/{id}', 'BlogController@deleteBlog')->name('deleteBlog');

//Slider   
Route::get('/slider', 'SliderController@index')->name('slider.index');
Route::get('/slider/add', 'SliderController@addSlider')->name('addSlider');
Route::post('/slider/store', 'SliderController@storeSlider')->name('storeSlider');
Route::get('/slider/edit/{id}', 'SliderController@editSlider')->name('editSlider');
Route::post('/slider/update/{id}', 'SliderController@updateSlider')->name('updateSlider');
Route::get('/slider/delete/{id}', 'SliderController@deleteSlider')->name('deleteSlider');

//AboutUs
Route::get('/aboutUs', 'AboutController@about')->name('about');
Route::post('/aboutUs/update_about/{id}', 'AboutController@updateAbout')->name('updateAbout');



//Benefit
Route::get('/benefit', 'BenefitController@benefit')->name('benefit');
Route::post('/benefit/update_benefit/{id}', 'BenefitController@updatebenefit')->name('updateBenefit');

//Callout
Route::get('/callout', 'CalloutController@index')->name('callout.index');
Route::get('/callout/add', 'CalloutController@addCallout')->name('addCallout');
Route::post('/callout/store', 'CalloutController@storeCallout')->name('storeCallout');
Route::get('/callout/edit/{id}', 'CalloutController@editCallout')->name('editCallout');
Route::post('/callout/update/{id}', 'CalloutController@updateCallout')->name('updateCallout');
Route::get('/callout/delete/{id}', 'CalloutController@deleteCallout')->name('deleteCallout');


//Gallery
Route::get('/gallery', 'GalleryController@index')->name('gallery.index');
Route::get('/gallery/add', 'GalleryController@addGallery')->name('addGallery');
Route::post('/gallery/store', 'GalleryController@storeGallery')->name('storeGallery');
Route::get('/gallery/delete/{id}', 'GalleryController@deleteGallery')->name('deleteGallery');

//Inspiration
Route::get('/inspiration', 'FrontendController@inspiration')->name('inspiration');
Route::post('/inspiration/update_inspiration/{id}', 'FrontendController@updateInspiration')->name('updateInspiration');

//Insurance
Route::get('/Insurance', 'InsuranceController@index')->name('insurance.index');
Route::get('/Insurance/add', 'InsuranceController@addInsurance')->name('addInsurance');
Route::post('/Insurance/store', 'InsuranceController@storeInsurance')->name('storeInsurance');
Route::get('/Insurance/delete/{id}', 'InsuranceController@deleteInsurance')->name('deleteInsurance');

//User Feedback
Route::get('/user-feedback', 'UserFeedbackController@index')->name('userFeedback.index');
Route::post('/userFeedback/store', 'UserFeedbackController@storeuserFeedback')->name('storeuserFeedback');
Route::get('/userFeedback/delete/{id}', 'UserFeedbackController@deleteuserFeedback')->name('deleteuserFeedback');

//Our Team
Route::get('/Ourteam', 'OurTeamController@index')->name('OurTeam.index');
Route::get('/ourteam/add', 'OurTeamController@addOurTeam')->name('addOurTeam');
Route::post('/Ourteam/store', 'OurTeamController@storeOurTeam')->name('storeOurTeam');
Route::get('/Ourteam/edit/{id}', 'OurTeamController@editOurTeam')->name('editOurTeam');
Route::post('/Ourteam/update/{id}', 'OurTeamController@updateOurTeam')->name('updateOurTeam');
Route::get('/Ourteam/delete/{id}', 'OurTeamController@deleteOurTeam')->name('deleteOurTeam');
Route::get('/ourteam/add', 'OurTeamController@addOurTeam')->name('addOurTeam');
});



Route::get('/logout', 'AdminLoginController@adminLogout')->name('adminLogout');
});

