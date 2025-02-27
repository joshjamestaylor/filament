<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;

Route::get('/', function () {
    $pages = Page::where('published', true)->get();
    return view('home', compact('pages'));
})->name('home');

Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('published', true)->firstOrFail();
    return view('pages.show', compact('page'));
})->name('page.show');
