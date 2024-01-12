<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Auth;
use Spatie\Glide\GlideImage;


class ImageController extends Controller
{
    //

    public function showAddMovieForm()
    {
        return view('images.add');
    }

    public function addMovie(Request $request)
    {
        $image = new Image();

        $image->title = $request->title;
        if (Auth::check()) {
            $image->user_id = Auth::id();
        }

        if ($request->hasfile('filename')) {
            $file = $request->file('filename');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images', $filename);
            $image->filename = $filename;
        }

        $image->description = $request->description;
        $image->genres = $request->genres;
        $image->save();

        return redirect('/');
    }




}
