<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.login.login');
});

Route::get('/dashboard', function () {

return view('content.dashboard.dashboard');

});

Route::resource('quotation',QuotationController::class);

Route::post('tilesublist',[QuotationController::class,'sublist'])->name('tilesublist.add');
Route::post('getId',[QuotationController::class,'generateIds'])->name('getIds');


Route::get('/tilesublist/edit',[QuotationController::class,'tilesublist_edit'])->name('tilesublist.edit');

Route::post('/tilesublist_update/{unique_id}',[QuotationController::class,'sublist_update'])->name('tilesublist.update');


Route::post('/tilesublist/delete',[QuotationController::class,'tilesublist_delete'])->name('tilesublist.delete');

Route::get('/tilesublist/data',[QuotationController::class,'sublist_data'])->name('getsublist_data');

Route::post('/sublist.delete/',[QuotationController::class,'sublist_delete'])->name('sublist_delete');

// Route::get('/login', function () {

// return view('content.dashboard.dashboard');

// });






