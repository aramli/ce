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

Route::get('/', function () {
    return view('welcome');
});


/*
*
* UAC
*
*/
Route::get('/login', 'UAC@login')->name('login');
Route::get('/logout', 'UAC@login')->name('logout');
Route::post('/VerifyLogin', 'UAC@VerifyLogin');

Route::get('/user/all', 'UAC@index')->name('view_all_user');

Route::get('/user/add', 'UAC@add')->name('add_new_user');
Route::post('/user/SaveNewUser', 'UAC@SaveNewUser');

Route::get('/user/detail/{id}', 'UAC@detail');
Route::post('/user/UpdateUserDetail', 'UAC@UpdateUserDetail');

Route::get('/user/detail/{id}/delete', 'UAC@DeleteUser');

Route::post('/user/UploadUserCSV', 'UAC@UploadUserCSV');

Route::get('/myprofile', 'UAC@myprofile')->name('my_profile');
Route::post('/UpdateMyProfile', 'UAC@UpdateMyProfile');

Route::get('/forgot_password', 'UAC@forgot_password')->name('forgot_password');
Route::post('/ResetMyPassword', 'UAC@ResetMyPassword');
Route::post('/ChangeMyPassword', 'UAC@ChangeMyPassword');






/*
*
* DASHBOARD
*
*/
Route::get('/dashboard', 'Dashboard@index')->name('dashboard');
Route::get('/dashboard/{dashboard_name}', 'Dashboard@DisplayDashboardByType');
Route::get('/dashboard/template/{dashboard_name}', 'Dashboard@TemplateGenerator');
Route::post('/dashboard/action/AddNewDashboardItem', 'Dashboard@AddNewDashboardItem');




/*
*
* COMPANY
*
*/
Route::get('/company/all', 'Company@index')->name('view_all_company');

Route::get('/company/add', 'Company@add')->name('add_new_company');
Route::post('/company/SaveNewCompany', 'Company@SaveNewCompany');

Route::get('/company/detail/{id}', 'Company@detail');
Route::post('/company/UpdateCompanyDetail', 'Company@UpdateCompanyDetail');

Route::get('/company/detail/{id}/delete', 'Company@DeleteCompany');




/*
*
* DIVISION
*
*/
Route::get('/division/all', 'Division@index')->name('view_all_division');

Route::get('/division/add', 'Division@add')->name('add_new_division');
Route::post('/division/SaveNewDivision', 'Division@SaveNewDivision');

Route::get('/division/detail/{id}', 'Division@detail');
Route::post('/division/UpdateDivisionDetail', 'Division@UpdateDivisionDetail');

Route::get('/division/detail/{id}/delete', 'Division@DeleteDivision');




/*
*
* CATEGORY
*
*/
Route::get('/category/all', 'Category@index')->name('view_all_category');

Route::get('/category/add', 'Category@add')->name('add_new_category');
Route::post('/category/SaveNewCategory', 'Category@SaveNewCategory');

Route::get('/category/detail/{id}', 'Category@detail');
Route::post('/category/UpdateCategoryDetail', 'Category@UpdateCategoryDetail');

Route::get('/category/detail/{id}/delete', 'Category@DeleteCategory');




/*
*
* ROOM
*
*/
Route::get('/room/all', 'Room@index')->name('view_all_room');

Route::get('/room/add', 'Room@add')->name('add_new_room');
Route::post('/room/SaveNewRoom', 'Room@SaveNewRoom');

Route::get('/room/detail/{id}', 'Room@detail');
Route::post('/room/UpdateRoomDetail', 'Room@UpdateRoomDetail');

Route::get('/room/detail/{id}/delete', 'Room@DeleteRoom');




/*
*
* EVENT
*
*/
Route::get('/event/SetupNewEvent', 'Event@SetupNewEvent')->name('create_temp_event');
Route::get('/event/add/{id}/basic', 'Event@add_basic');
Route::get('/event/add/{id}/attendee', 'Event@add_attendee');
Route::get('/event/add/{id}/attendee/{id_attendee}/register', 'Event@register_attendee');
Route::get('/event/add/{id}/attendee/{id_attendee}/remove', 'Event@remove_attendee');
Route::post('/event/add/{id}/SaveNewEvent', 'Event@SaveNewEvent');
Route::post('/event/add/{id}/SubmitForReview', 'Event@SubmitForReview');
Route::get('/event/add/{id}/SubmitForReviewGet', 'Event@SubmitForReviewGet');

Route::get('/event/all', 'Event@all')->name('view_all_event');
Route::get('/event/today', 'Event@today')->name('view_today_event');

Route::get('/event/detail/{id}', 'Event@detail');
Route::get('/event/detail/{id}/DeleteEvent', 'Event@DeleteEvent');
Route::get('/event/detail/{id}/RejectEvent', 'Event@RejectEvent');
Route::get('/event/detail/{id}/ApproveEvent', 'Event@ApproveEvent');
Route::get('/event/detail/{id}/BlastInvitation', 'Event@BlastInvitation');

Route::get('/event/panel/{id}', 'Event@EventPanel');
Route::get('/event/panel/{id}/Panel_StartEvent', 'Event@Panel_StartEvent');
Route::get('/event/panel/{id}/Panel_StopEvent', 'Event@Panel_StopEvent');
Route::get('/event/panel/{id}/Panel_ExtendEvent', 'Event@Panel_ExtendEvent');
Route::get('/event/panel/{id}/Panel_OverrideAttend/{id_user_attendee}', 'Event@Panel_OverrideAttend');





/*
*
* REPORTING
*
*/
Route::get('/report/event/event_creation', 'Report@event_creation')->name('reporting__event_creation');
Route::get('/report/event/over_target_duration', 'Report@over_target_duration')->name('reporting__over_target_duration');

Route::get('/report/energy/today_energy_consumption', 'Report@today_energy_consumption')->name('reporting__today_energy_consumption');
Route::get('/report/energy/energy_consumption_rank', 'Report@energy_consumption_rank')->name('reporting__energy_consumption_rank');
Route::get('/report/energy/over_consumption_event', 'Report@over_consumption_event')->name('reporting__over_consumption_event');




Route::get('/test', 'UAC@test');
