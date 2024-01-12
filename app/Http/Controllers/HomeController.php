<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Image::get();
        return view('home', compact('movies'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $movies = Image::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('home', compact('movies'));
    }

    public function description($id)
    {

        $movie = Image::findOrFail($id);

        return view('description', ['movie' => $movie]);
    }

    public function delete($id)
    {
        $movie = Image::findOrFail($id);
        $movie->delete();

        return redirect()->route('home')->with('success', 'Movie deleted successfully!');
    }

    public function seat()
    {
        $movie = Image::get();

        return view('seat', ['movie' => $movie]);
    }
}
