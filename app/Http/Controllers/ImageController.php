<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{

    public function index()
    {   
        $images = Image::all();
        return view('images.create', compact('images'));
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('images', 's3');

        Storage::disk('s3')->setVisibility($path, 'public');
        //$path = Storage::disk('s3')->put('images/'.$request->user()->id, $request->file('file_name'), 'public');

        $image = Image::create([
            'filename' => basename($path),
            'url' => Storage::disk('s3')->url($path)
        ]);

        return back();
        //return $image;
    }

    public function show(Image $image)
    {
        return Storage::disk('s3')->response('images/' . $image->filename);
        //return $image->url;
    }
}
