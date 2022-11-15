<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index() {
        // get all photos created in the last 24 hours and paginate six items after ordering by date
        $photos = Photo::where('created_at', '>=', now()->subDay())->orderBy('created_at', 'desc')->paginate(6);
        return view('photos.index')->with(compact('photos'));
    }

    public function create() {
        return view('photos.create');
    }

    public function store(Request $request) {
        $request->validate([
            'caption' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $photo = $request->file('photo');
        $photo_path = time() . '.' . $photo->extension();
        $photo->move(public_path('images'), $photo_path);

        Photo::create([
            'caption' => $request->caption,
            'photo_path' => $photo_path,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('photos.index')->with('success', 'Photo uploaded successfully!');
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required|string|max:255'
        ]);

        $photos = Photo::where('caption', 'like', '%' . $request->search . '%')->paginate(6);
        return view('photos.index')->with(compact('photos'));
    }
}
