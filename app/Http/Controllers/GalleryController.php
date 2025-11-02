<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Image;

class GalleryController extends Controller
{
    // Need to fix this
    public function index()
    {
        $images = Image::all(); // Fetch all images or use pagination

        return Inertia::render('gallery/Index', [
            'images' => $images->map(function ($image) {
                $image->url = asset('storage/' . $image->file_path); // Generate a URL to the image file
                return $image;
            }),
        ]);
    }

    public function showImage($id)
    {
        $image = Image::findOrFail($id);
        $image->url = asset('storage/' . $image->file_path);

        return Inertia::render('Image/Show', [
            'image' => $image,

        ]);
    }

    public function nextImage($id)
    {
        // Find the current image
        $currentImage = Image::findOrFail($id);
        // Get the next image
        $nextImage = Image::where('order', '>', $currentImage->order)
            ->orderBy('order', 'asc')
            ->first();

        // Redirect to the next image or back to the current image if it's the last one
        return redirect()->route('images.show', ['id' => $nextImage ? $nextImage->id : $currentImage->id]);
    }

    public function previousImage($id)
    {
        // Find the current image
        $currentImage = Image::findOrFail($id);
        // Get the previous image
        $previousImage = Image::where('order', '<', $currentImage->order)
            ->orderBy('order', 'desc')
            ->first();

        // Redirect to the previous image or back to the current image if it's the first one
        return redirect()->route('images.show', ['id' => $previousImage ? $previousImage->id : $currentImage->id]);
    }
}
