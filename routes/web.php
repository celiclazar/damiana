<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

Route::get('/', function () {
    $files = Storage::files('gallery');
    $backgroundFiles = Storage::files('background');
    $backgroundImage = !empty($backgroundFiles) ? Storage::url($backgroundFiles[0]) : null;

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
            'circleImageUrl' => asset('images/lazar.celic.jpg')
        ],
        'galleryPreview' => [
            'title' => 'Gallery',
            'featuredImages' => array_slice($images, 0, 6),
        ],
        'reviewsPreview' => [
            'title' => 'Reviews',
            'description' => 'Ines je najjaci lik, naj tetovaza na svetu. Very black, much snake',
            'image' => asset('images/review.jpg'),
        ],
        'bookingPreview' => [
            'title' => 'Booking',
            'description' => 'A short snippet from the booking page...',
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
    return  Inertia::render('about/Index', [
        'galleryPreview' => [
            'title' => 'Gallery',
            'featuredImages' => [
                asset('images/gallery1.jpg'),
                asset('images/gallery2.jpg'),
                asset('images/gallery3.jpg'),
                asset('images/gallery4.jpg'),
                asset('images/gallery5.jpg'),
                asset('images/gallery6.jpg'),
                // ... more images
            ],
            'link' => route('gallery'),
        ],
        'image' =>  asset('images/about.jpg'),
    ]);
})->name('about');

Route::get('/faq', function () {
    return  Inertia::render('faq/Index', [
        'title' => 'FAQ',
    ]);
});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

require __DIR__.'/settings.php';
