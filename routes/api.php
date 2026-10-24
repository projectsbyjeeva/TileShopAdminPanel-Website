<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserTypeController;
use App\Http\Controllers\Api\UserCreateController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuotationController;



Route::get('/test', function () {
    return response()->json([
        "message" => "Laravel API working and connected"
    ]);
}); 


Route::post('/login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->group(function (){


Route::get('/user-types', [UserTypeController::class, 'index']);

Route::post('/user-type-store',[UserTypeController::class,'store']);
Route::get('/user-type-get/{id}', [UserTypeController::class, 'show']);
Route::put('/user-type-update/{id}', [UserTypeController::class, 'update']);
Route::delete('/user-type-delete/{id}', [UserTypeController::class, 'destroy']);

Route::get('/quotation/generate-ids', [QuotationController::class, 'generateIds']);
Route::post('/quotation/add-item', [QuotationController::class, 'addItem']);
Route::post('/quotation/main-submit', [QuotationController::class, 'mainSubmit']);
Route::post('/quotation/delete-sublistitem/', [QuotationController::class, 'deletesub']);


Route::get('/quotation/list', [QuotationController::class, 'index']);
Route::get('/quotation/search', [QuotationController::class, 'search']);
Route::get('/quotation/get/{id}', [QuotationController::class, 'getdata']);

Route::post('/quotation/update/{id}', [QuotationController::class, 'update']);
Route::get('/quotation-view/{id}', [QuotationController::class, 'view']);
Route::post('quotation_main-delete/{id}',[QuotationController::class,'maindelete']);



Route::get('/user-create', [UserCreateController::class, 'index']);

Route::post('/user-create-store',[UserCreateController::class,'store']);
Route::get('/user-create-edit/{id}', [UserCreateController::class, 'show']);
Route::put('/user-create-update/{id}', [UserCreateController::class, 'update']);
Route::delete('/user-create-delete/{id}', [UserCreateController::class, 'destroy']);

Route::get('usertype_get', [UserCreateController::class, 'usertype']);

Route::post('/logout',[AuthController::class,'logout']);

});
