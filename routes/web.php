<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

Route::get('/', function () {
    $files = Storage::files('gallery');
    $backgroundPath = 'background/home_background.jpg';
    $circlePath = 'background/aboutCircle.jpg';

    $backgroundImage = Storage::exists($backgroundPath)
        ? Storage::url($backgroundPath)
        : null;

    $backgroundCircleImage = Storage::exists($circlePath)
        ? Storage::url($circlePath)
        : null;

    $images = array_map(function($file){
        return [
            'id' => $file,
            'url' => Storage::url($file)
        ];
    }, $files);

    return Inertia::render('Home', [
        'aboutPreview' => [
            'title' => 'About Me',
            'description' => 'A short snippet from the about page...',
            'circleImageUrl' => $backgroundCircleImage
        ],
        'galleryPreview' => [
            'title' => 'Gallery',
            'featuredImages' => array_slice($images, 0, 6),
        ],
        'imageHeaderSection' => [
            'imageUrl' => $backgroundImage
        ]
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    $files = Storage::files('gallery');

    $backgroundPath = 'background/aboutPage.jpg';
    $backgroundImage = Storage::exists($backgroundPath)
        ? Storage::url($backgroundPath)
        : null;
    $images = array_map(function($file){
        return [
            'id' => $file,
            'url' => Storage::url($file)
        ];
    }, $files);

    return  Inertia::render('about/Index', [
        'galleryPreview' => [
            'title' => 'Gallery',
            'featuredImages' => array_slice($images, 0, 6),
            'link' => route('gallery'),
        ],
        'image' =>  $backgroundImage
    ]);
})->name('about');

Route::get('/faq', function () {
    return  Inertia::render('faq/Index', [
        'title' => 'FAQ',
    ]);
});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

require __DIR__.'/settings.php';
