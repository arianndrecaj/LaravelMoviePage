<?php

namespace App\Services;

use Intervention\Image\Facades\Image as ImageIntervention;

class GlideService
{
    public function fixImage($imagePath, $resize = null, $blur = null, $pixelate = null, $rotate = null, $flip = null)
    {
        $image = ImageIntervention::make($imagePath);

        if ($resize) {
            $image->resize($resize);
        }

        if ($rotate) {
            $image->rotate($rotate);
        }

        if ($flip) {
            $image->flip($flip);
        }


        if ($blur) {
            $image->blur($blur);
        }

        return $image->stream();
    }
}

?>