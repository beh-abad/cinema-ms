<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessActions;
use App\Http\Controllers\ProcessActionsInAdminPanel;
use App\Http\Controllers\ProcessActionsInAdminPanel2;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\HasBoughtBill;

//*************** */
//USER ROUTES
//*************** */

Route::view('error', 'error');
Route::view('usersignup', 'user_signup');
Route::view('userlogin', 'user_login');
Route::view('forgettingpassword', 'forgetting_password');
Route::view('successaction', 'success_action');
Route::view('buybill', "buy_bill");
Route::view('successaction', 'success_action');
Route::get('setfilmid/{film_id}', [ProcessActions::class, 'SetFilmId']);
Route::get('/', [ProcessActions::class, 'ShowList']);
Route::get('buybill/{id}', [ProcessActions::class, "BuyBill"]);
Route::get('ordersuser/{id}', [ProcessActions::class, 'OrdersUser']);
Route::post('usersignup', [ProcessActions::class, 'RegisterAUser']);
Route::post('comment', [ProcessActions::class, "AddAComment"]);
Route::post('userlogin', [ProcessActions::class, 'Login']);
Route::post('forgettingpassword', [ProcessActions::class, 'ForgettingPassword']);
Route::get('newsuser', [ProcessActions::class, "ShowNews"]);
Route::group(['middleware' => ['authuser2']], function () {
    Route::view('resettingpassword', 'resetting_password');
    Route::get('successaction/{id}', [ProcessActions::class, 'RegisterOrder']);
    Route::get('export-pdf/{id}', [ProcessActions::class, 'CreatePdfFile']);
    Route::post('resettingpassword', [ProcessActions::class, 'ResettingPassword']);
});

//*************** */
//ADMIN ROUTES
//*************** */

Route::view('addafilm', 'add_a_film');
Route::view('famimages', 'fam_images');
Route::get('filmsadmin', [ProcessActionsInAdminPanel::class, 'FilmsAdmin']);
Route::get('selectacity/{id}', [ProcessActionsInAdminPanel::class, 'InitCities']);
Route::get('selectaplace/{place_id}', [ProcessActionsInAdminPanel::class, 'InitPlaces']);
Route::get('addafilm', [ProcessActionsInAdminPanel::class, 'AddAFilmFirstInit']);
Route::post('addafilm', [ProcessActionsInAdminPanel::class, 'AddAFilm']);
Route::get('editafilm/{id}', [ProcessActionsInAdminPanel::class, 'EditAFilm']);
Route::post('editthisfilm', [ProcessActionsInAdminPanel::class, 'UpdateTheFilmInformation']);
Route::get('delete_an_item/{id}', [ProcessActionsInAdminPanel::class, 'DeleteAFilm']);
Route::get('placesadmin', [ProcessActionsInAdminPanel::class, 'PlacesAdmin']);
Route::get('addaplace', [ProcessActionsInAdminPanel::class, 'AddAPlaceFirstInit']);
Route::post('addaplace', [ProcessActionsInAdminPanel::class, 'AddAPlace']);
Route::get('editaplace/{id}', [ProcessActionsInAdminPanel::class, 'EditAPlace']);
Route::post('editthisplace', [ProcessActionsInAdminPanel::class, 'UpdateThePlaceInformation']);
Route::get('deleteaplace/{id}', [ProcessActionsInAdminPanel::class, 'DeleteAPlace']);
Route::post('famimages', [ProcessActionsInAdminPanel::class, 'BestImages']);
Route::view('addnews', 'add_news');
Route::get('newsadmin', [ProcessActionsInAdminPanel::class, "NewsAdmin"]);
Route::post('addnews', [ProcessActionsInAdminPanel::class, "AddNews"]);
Route::get('editnews/{identification}', [ProcessActionsInAdminPanel::class, "EditNews"]);
Route::post('updatenewsinformation', [ProcessActionsInAdminPanel::class, "UpdateNewsInformation"]);
Route::get('deletenews/{identification}', [ProcessActionsInAdminPanel::class, "DeleteNews"]);
Route::get('usersadmin', [ProcessActionsInAdminPanel::class, "UsersAdmin"]);
Route::get('deleteauser/{id}', [ProcessActionsInAdminPanel::class, "DeleteAUser"]);
Route::get('ordersadmin', [ProcessActionsInAdminPanel::class, 'OrdersAdmin']);
Route::get('deleteanorder/{id}', [ProcessActionsInAdminPanel::class, 'DeleteAnOrder']);
