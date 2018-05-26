<?php

Auth::routes();

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@show']);

Route::prefix('services')->group(function () {
    Route::get('consulting', ['as' => 'consulting', 'uses' => 'ServicesController@showConsulting']);
    Route::get('recruitment', ['as' => 'recruitment', 'uses' => 'ServicesController@showRecruitment']);
    Route::get('staffing', ['as' => 'staffing', 'uses' => 'ServicesController@showStaffing']);
});

Route::prefix('workers')->group(function (){
    Route::get('show', ['as' => 'workers-show', 'uses' => 'WorkersController@show']);

    Route::get('lazy', ['as' => 'workers-data', 'uses' => 'WorkersController@getNode']);
    Route::post('mass', ['as' => 'workers-mass', 'uses' => 'WorkersController@getMass']);

    Route::get('search', ['as' => 'workers-search', 'uses' => 'WorkersController@searchItems']);
    Route::get('move', ['as' => 'workers-move', 'uses' => 'WorkersController@moveItem']);
});

Route::get('/contacts', ['as' => 'contacts', 'uses' => 'ContactsController@show']);
Route::post('/contacts', ['as' => 'contacts', 'uses' => 'ContactsController@send']);

Route::any('/comments', ['as' => 'comments', 'uses' => 'CommentsController@show']);

Route::get('/profile', ['as' => 'profile', 'uses' => 'ProfileController@show']);

Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@show']);

Route::get('/download/{fileType}/{fileName}', ['as' => 'download', 'uses' => 'DownloadsController@download']);

Route::get('/redirect/{where}/', ['as' => 'redirect', 'uses' => 'RedirectController@redirectAway']);

Route::prefix('control')->group(function () {
    Route::get('panel', ['as' => 'panel', 'uses' => 'ControlPanelController@show']);

    Route::post('comments-lazy', ['as' => 'comments-lazy', 'uses' => 'ControlPanelController@getComments']);
    Route::post('actionComment', ['as' => 'actionComment', 'uses' => 'ControlPanelController@actionComment']);
    Route::get('setCommentModerated', ['as' => 'setCommentModerated', 'uses' => 'ControlPanelController@setCommentModerated']);

    Route::post('contacts-lazy', ['as' => 'contacts-lazy', 'uses' => 'ControlPanelController@getContacts']);
    Route::post('actionContacts', ['as' => 'actionContacts', 'uses' => 'ControlPanelController@actionContacts']);
    Route::get('setContactCompleted', ['as' => 'setContactCompleted', 'uses' => 'ControlPanelController@setContactCompleted']);

    Route::post('workers-lazy', ['as' => 'workers-lazy', 'uses' => 'ControlPanelController@getWorkers']);
    Route::post('actionWorkers', ['as' => 'actionWorkers', 'uses' => 'ControlPanelController@actionWorkers']);
    Route::get('getWorkerRecord', ['as' => 'getWorkerRecord', 'uses' => 'ControlPanelController@getWorkerRecord']);
    Route::get('getImageLink', ['as' => 'getImageLink', 'uses' => 'ControlPanelController@getImageLink']);

    Route::post('salary-lazy', ['as' => 'salary-lazy', 'uses' => 'ControlPanelController@getSalary']);
    Route::post('actionSalary', ['as' => 'actionSalary', 'uses' => 'ControlPanelController@actionSalary']);

    Route::post('changePassword', ['as' => 'changePassword', 'uses' => 'ControlPanelController@changePassword']);
});
