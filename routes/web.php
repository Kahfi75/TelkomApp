<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;

use App\Exports\VisitsExport;
use Maatwebsite\Excel\Facades\Excel;


Route::get('/', [WelcomeController::class, 'showWelcome']);
Route::get('/home', [HomeController::class, 'index']); 
Route::get('/visits/create', [VisitController::class, 'create'])->name('visit.create');
Route::post('/visit/store', [VisitController::class, 'store'])->name('visit.store');
Route::get('/visit', [VisitController::class, 'index'])->name('visit.index');

Route::get('/visit/{id}/edit', [VisitController::class, 'edit'])->name('visit.edit');
Route::put('/visit/{id}', [VisitController::class, 'update'])->name('visit.update');
Route::delete('/visit/{id}', [VisitController::class, 'destroy'])->name('visit.destroy');
Route::post('/import-keterangan', [VisitController::class, 'importKeterangan'])->name('visit.import');
Route::post('/visit/reset', [VisitController::class, 'resetDropdown'])->name('visit.reset');
Route::get('/visit/data/{keterangan_visit}', [VisitController::class, 'getVisitData'])->name('visit.data');




Route::get('visits/export', function () {
    return Excel::download(new VisitsExport, 'visits.xlsx');
})->name('visits.export');

Route::get('/visits', function () {
    return view('index_visit');
})->name('visits.index');

Route::get('/visits/export', [VisitController::class, 'export'])->name('visits.export');

Route::post('/visits/reset', [VisitController::class, 'reset'])->name('visits.reset');

