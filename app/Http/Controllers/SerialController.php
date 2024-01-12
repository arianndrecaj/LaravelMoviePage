<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serial;
use App\Models\Image;
use Auth;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seriale = Serial::get();
        return view('seriale', compact('seriale'));
    }


    public function showAddSerialForm()
    {
        return view('images.addserial');

    }

    public function addSerial(Request $request)
    {
        $image = new Serial();

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

        return redirect('/seriale');
    }


    public function description($id)
    {

        $movie = Serial::findOrFail($id);

        return view('serialdescription', ['serial' => $movie]);
    }

    public function delete($id)
    {
        $movie = Serial::findOrFail($id);
        $movie->delete();

        return redirect()->route('seriale')->with('success', 'Movie deleted successfully!');
    }

    public function search(Request $request)
    {
        $search = $request->search_seriale;
        $seriale = Serial::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('seriale', compact('seriale'));
    }

}

