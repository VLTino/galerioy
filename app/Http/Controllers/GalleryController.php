<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Http\Requests\StoregalleryRequest;
use App\Http\Requests\UpdategalleryRequest;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hal.galeriku', [
            "title" => "Galeriku"
        ]);
    }

    public function detail()
    {
        return view('hal.detail', [
            "title" => "Detail"
        ]);
    }

    public function upload()
    {
        return view('hal.upload', [
            "title" => "Upload"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoregalleryRequest $request)
    {
        // Menyimpan gambar
        $gambarPath = $request->file('gambar')->store('img', 'public');

        // Membuat objek Gallery
        $gallery = new gallery();
        $gallery->describe_photo = $request->input('describe_photo');
        $gallery->gambar = $gambarPath;
        $gallery->userid = $request->input('userid');
        $gallery->like_post = $request->input('like_post');
        $gallery->save();

        return redirect()->route('/galeriku')->with('success', 'User successfully registered. Please login.');
    }


    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategalleryRequest $request, gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gallery $gallery)
    {
        //
    }
}
