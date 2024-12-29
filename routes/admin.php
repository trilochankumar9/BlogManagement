<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{AdminManageController};

Route::controller(AdminManageController::class)->prefix('/admin')->group(function () {
    Route::get('dashboard', 'dashboard')->name('/admin/dashboard');
    Route::get('user-list', 'user_list')->name('/admin/user-list');
    Route::get('user-delete/{userId}', 'user_delete')->name('/admin/user-delete');
    Route::get('user-edit/{userId}', 'user_edit')->name('/admin/user-edit');
    Route::post('user-update/{userId}', 'user_update')->name('/admin/user-update');

    Route::get('post', 'post')->name('/admin/post');
    Route::get('post-delete/{postId}', 'post_delete')->name('/admin/post-delete');
});
