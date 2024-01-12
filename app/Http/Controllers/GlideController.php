<?php

// app/Http/Controllers/GlideController.php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Serial;
use App\Services\GlideService;
use Illuminate\Http\Request;

class GlideController extends Controller
{
    protected $glideService;

    public function __construct(GlideService $glideService)
    {
        $this->glideService = $glideService;
    }

    public function fixImage($image)
    {
        $img = Image::findOrFail($image);
        $resize = '600x400';
        // $rotate = 180;
        // $flip = 'h';
        $path = public_path('images\\' . $img->filename);
        $fixedImage = $this->glideService->fixImage($path, $resize, );
        return response($fixedImage, 200)->header('Content-Type', 'image/jpeg');
    }
    public function fixSerialImage($image)
    {
        $img = Serial::findOrFail($image);
        $resize = '100x100';
        $blur = 100;
        // $gamma = 10;
        $pixelate = -10;
        $path = public_path('images\\' . $img->filename);
        $fixedImage = $this->glideService->fixImage($path, $resize, $blur, $pixelate);
        return response($fixedImage, 200)->header('Content-Type', 'image/jpeg');



    }
}
