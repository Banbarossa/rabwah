<?php

use App\Livewire\Welcome\EducationLevelsPage;
use App\Livewire\Welcome\HomePage;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', HomePage::class)->name('home');
Route::get('/jenjang-pendidikan', EducationLevelsPage::class)->name('pendidikan');
Route::get('/donasi', \App\Livewire\Welcome\Donasi::class)->name('donasi');
Route::get('/donasi/detail{slug}/',\App\Livewire\Fundraising\DetailProgram::class)->name('donasi.detail');
Route::get('/donasi/bayar/{slug}/',\App\Livewire\Fundraising\PaymentDetail::class)->name('donasi.bayar');
//Route::get('/donasi', DonationPage::class)->name('donasi');
Route::get('/posts', \App\Livewire\Welcome\PostsPage::class)->name('posts');
Route::get('/post', \App\Livewire\Welcome\SinglePost::class)->name('post');
Route::get('/tentang', \App\Livewire\Welcome\About::class)->name('tentang');
Route::get('/test', \App\Livewire\Fundraising\Donasi::class)->name('test');

//FileManager
//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => [ 'auth']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', \App\Livewire\Dashboard\MainPage::class)->name('dashboard');
    Route::get('profile', App\Livewire\Settings\Profile::class)->name('profile.edit');
    Route::get('update-password', App\Livewire\Settings\Password::class)->name('user-password.edit');
    Route::get('two-factor', App\Livewire\Settings\TwoFactor::class)->name('two-factor.show');
    Route::get('apperance', App\Livewire\Settings\Appearance::class)->name('appearance.edit');
    Route::get('file-manager', App\Livewire\Admin\FileManager\FileManagerPage::class)->name('file-manager');
    Route::get('filemanager', App\Livewire\Admin\FileManager\Unisharp::class)->name('filemanager');

});
Route::group(['middleware' => ['auth'],'prefix' => 'post', 'as' => 'post.'], function () {
    Route::get('/', \App\Livewire\Admin\Post\MainPost::class)->name('index');
    Route::get('/form/{post?}', \App\Livewire\Admin\Post\FormPost::class)->name('form');
    Route::get('/category', \App\Livewire\Admin\Post\CategoryPage::class)->name('category');
    Route::get('/category/form/{category?}', \App\Livewire\Admin\Post\FormCategory::class)->name('category.form');
    Route::get('/tag', \App\Livewire\Admin\Post\MainTag::class)->name('tag');
    Route::get('/tag/form/{category?}', \App\Livewire\Admin\Post\FormTag::class)->name('tag.form');
});
Route::group(['middleware' => ['auth'],'prefix' => 'fundraising', 'as' => 'fundraising.'], function () {
    Route::get('/donatur', \App\Livewire\Admin\Fundraising\Donatur::class)->name('donatur');
    Route::get('/donatur/form/{donor?}', \App\Livewire\Admin\Fundraising\FormDonatur::class)->name('donatur.form');
    Route::get('/program/', \App\Livewire\Admin\Fundraising\Program::class)->name('program');
    Route::get('/program/form/{program?}', \App\Livewire\Admin\Fundraising\ProgramForm::class)->name('program.form');

});
