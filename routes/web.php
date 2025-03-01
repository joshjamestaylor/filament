<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Models\Entry;


Route::get('/', function () {
    $pages = Page::where('published', true)->get();
    return view('home', compact('pages'));
})->name('home');

Route::get('/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('published', true)->firstOrFail();
    return view('pages.show', compact('page'));
})->name('page.show');

Route::get('/{slug}/{entry_slug}', function ($slug, $entry_slug) {
    $entries = Entry::where('slug', $slug)->firstOrFail();

    $collection = collect($entries['content']);
    
    $entry = $collection->firstWhere(function ($item) use ($entry_slug) {
        return $item['data']['entry_slug'] === $entry_slug;
    });

    if(!$entry) {
        abort(404);
    }
    
    return view('entries.show', compact('entry'));
});
