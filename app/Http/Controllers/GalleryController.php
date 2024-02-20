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
    public function home()
    {
        return view('hal.home',[
            "title" => "Dashboard",
            "posts" => gallery::all(),
        ]);
    }

    public function index()
    {
        return view('hal.galeriku', [
            "title" => "Galeriku",
        ]);
    }

    public function detail(gallery $post)
    {
        return view('hal.detail', [
            "title" => "Detail",
            "post" => $post,
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
        $gallery = new Gallery();
        $gallery->describe_photo = $request->input('describe_photo');
        $gallery->userid = $request->input('userid');
        $gallery->like_post = $request->input('like_post');

        // Handling file upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save image to storage
            Storage::putFileAs('public/img', $image, $imageName);

            // Save image name to database
            $gallery->gambar = $imageName;
        }

        $gallery->save();

        return redirect()->route('galeriku');
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
