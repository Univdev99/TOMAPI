<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/dbtest', 'ProfessionalController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'cors'], function() {

    Route::post('/common/user/save', 'RegisterController@register');
    
    Route::group(['prefix' => '/tom'], function(){

        Route::post('/login', 'LoginController@index');
        // Route::post('/component/select/soft_search', '');
    
        Route::post('/professional/personalProfile/get', 'ProfessionalController@personalProfileGet');
        Route::post('/professional/personalProfile/save', 'ProfessionalController@personalProfileSave');

        Route::post('/professional/workAvail/get', 'ProfessionalController@workAvailGet');//
        Route::post('/professional/workAvail/save', 'ProfessionalController@workAvailSave');

        Route::post('/professional/workExp/get', 'ProfessionalController@workExpGet');
        Route::post('/professional/workExp/save', 'ProfessionalController@workExpSave');

        Route::get('/professional/tree/get', 'ProfessionalController@treeGet');
        Route::get('/professional/search', 'ProfessionalController@search');
        Route::get('/professional/getWholeProfile', 'ProfessionalController@getWholeProfile');
        Route::get('/professional/job/get', 'ProfessionalController@jobGet');
        Route::get('/professional/project/accpeted', 'ProfessionalController@projectAccpeted');
        Route::get('/professional/project/history', 'ProfessionalController@projectHistory');
        Route::get('/professional/project/complete', 'ProfessionalController@projectComplete');
        Route::get('/professional/workExp/expWithSkill', 'ProfessionalController@workExpWithSkill');

        Route::post('/component/select/soft_search', 'ComponentController@softSearch');
    });
 });
