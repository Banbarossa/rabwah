<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\EducationLevelsPage;
use App\Livewire\DonationPage;

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

Route::get('/', HomePage::class);
Route::get('/jenjang-pendidikan', EducationLevelsPage::class)->name('pendidikan');
Route::get('/donasi', \App\Livewire\Welcome\Donasi::class)->name('donasi');
//Route::get('/donasi', DonationPage::class)->name('donasi');
Route::get('/posts', \App\Livewire\Welcome\PostsPage::class)->name('posts');
Route::get('/post', \App\Livewire\Welcome\SinglePost::class)->name('post');
Route::get('/tentang', \App\Livewire\Welcome\About::class)->name('tentang');
