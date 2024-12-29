<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Common\{AuthenticationManageController};
use App\Http\Controllers\Common\GoogleController;
use App\Http\Controllers\User\{UserManageController, UserPostManageController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthenticationManageController::class)->group(function () {
        Route::get('/', 'index')->name('/');
        Route::get('/register', 'register')->name('/register');
        Route::post('/registration', 'register_submit')->name('registration');
        Route::post('/login', 'login')->name('/login');
        
});
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::middleware(['auth', 'log.activity'])->group(function () {
        Route::controller(UserManageController::class)->prefix('/user')->group(function () {
                Route::get('dashboard', 'dashboard')->name('/user/dashboard');
        });

        Route::controller(UserPostManageController::class)->prefix('/user')->group(function () {
                Route::get('post', 'post')->name('/user/post');
                Route::get('post-add', 'post_add')->name('/user/post-add');
                Route::post('post-save', 'post_save')->name('/user/post-save');
                Route::get('post-delete/{postId}', 'post_delete')->name('/user/post-delete');
                Route::get('post-edit/{postId}', 'post_edit')->name('/user/post-edit');
                Route::post('post-update/{postId}', 'post_update')->name('/user/post-update');

                Route::get('view-all-comments/{postId}', 'viewAllComments')->name('/user/view-all-comment');
                Route::get('add-comments/{postId}', 'addComments')->name('/user/add-comment');
                Route::post('save-comments/{postId}', 'saveComments')->name('/user/save-comment');
                Route::get('edit-comment/{comment}', 'editComments')->name('/user/edit-comment');
                Route::post('update-comments/{comment}', 'updateComments')->name('/user/update-comment');
                Route::get('delete-comment/{commentId}', 'deleteComment')->name('/user/delete-comment');
        });
        
      

        Route::controller(AuthenticationManageController::class)->group(function () {
                Route::get('/logout', 'logout')->name('/logout');
        });
});