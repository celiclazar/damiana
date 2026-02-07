<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/make-bucket-public', function () {
    try {
        $client = Storage::disk('s3')->getClient();
        $bucket = config('filesystems.disks.s3.bucket');

        $policy = [
            "Version" => "2012-10-17",
            "Statement" => [
                [
                    "Effect" => "Allow",
                    "Principal" => "*",
                    "Action" => ["s3:GetObject"],
                    "Resource" => ["arn:aws:s3:::{$bucket}/*"]
                ]
            ]
        ];

        $client->putBucketPolicy([
            'Bucket' => $bucket,
            'Policy' => json_encode($policy),
        ]);

        return "Success: Bucket '{$bucket}' is now public. Images should load now!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/', function () {
//    $files = Storage::disk('s3')->files('gallery');
//
//    $images = array_map(function($file) {
//        return [
//            'id' => $file, // Using the filename as a unique ID
//            'url' => Storage::disk('s3')->url($file)
//        ];
//    }, $files);

    $images = Cache::remember('home_gallery_images', 86400, function () {
        // Fetch all files in the 'gallery' folder
        $files = Storage::disk('s3')->files('gallery');

        return array_map(fn($file) => [
            'id' => $file,
            'url' => Storage::disk('s3')->url($file)
        ], $files);
    });

    //dd($files, $featuredImages);

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
        'merchPreview' => [
            'title' => 'Merch',
            'backgroundImgUrl' => asset('images/home_merch.jpg')
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
