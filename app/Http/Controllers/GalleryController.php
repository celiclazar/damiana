<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Image;

class GalleryController extends Controller
{
    public function index()
    {
        /*
         * If I need filter in gallery page, use it like this. Look into the model class.
         *

        $type = $request->query('type', 'tattoo');
        $images = Image::where('type', $type)
            ->orderBy('order', 'asc')
            ->get();
        *
        */

        return Inertia::render('gallery/Index', [
            'images' => Image::orderBy('order', 'asc')->get()
        ]);
    }

    public function showImage($id)
    {
        return Inertia::render('Image/Show', [
            'image' => Image::findOrFail($id)
        ]);
    }

    public function nextImage($id)
    {
        $current = Image::findOrFail($id);

        $next = Image::where('order', '>', $current->order)
            ->orderBy('order', 'asc')
            ->first();

        return redirect()->route('images.show', ['id' => $next ? $next->id : $current->id]);

    }

    public function previousImage($id)
    {
        $current = Image::findOrFail($id);
        $prev = Image::where('order', '<', $current->order)
            ->orderBy('order', 'desc')
            ->first();

        return redirect()->route('images.show', ['id' => $prev ? $prev->id : $current->id]);
    }
}
