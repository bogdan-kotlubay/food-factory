<?php



Route::group( [ 'namespace' => 'App\Modules\Adminpanel\Controllers',
    'as' => 'adminpanel.', ['middleware' => 'auth'], 'prefix' => 'admin', 'middleware' => 'web'
], function(){
    Route::get('/',     ['uses' => 'AdminController@index'])->middleware('auth');
    Route::resource('users', 'UsersController')->middleware('auth');
    Route::resource('departments', 'DepartmentsController')->middleware('auth');
    Route::resource('branches', 'BranchesController')->middleware('auth');
    Route::resource('positions', 'PositionsController')->middleware('auth');
    Route::resource('tasks', 'TasksController')->middleware('auth');
    Route::resource('comingproducts', 'ComingProductsController')->middleware('auth');
    Route::resource('uncomingproducts', 'UncomingProductsController')->middleware('auth');
    Route::resource('directory', 'DirectoryProductsController')->middleware('auth');

});
