<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Http\Requests\StoregalleryRequest;
use App\Http\Requests\UpdategalleryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('hal.home', [
            "title" => "Dashboard",
            "posts" => gallery::all(),
        ]);
    }

    public function index()
    {

        $userID = Auth::user()->userid;


        $posts = gallery::where('userid', $userID)->get();

        return view('hal.galeriku', [
            "title" => "Galeriku",
            "posts" => $posts,
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

        return redirect()->route('galeriku')->with('success', 'Gambar berhasil ditambahkan');
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
    public function edit(gallery $post)
    {
        return view('hal.editgambar', [
            "title" => "Edit",
            "post" => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, $id)
{
    $gallery = Gallery::findOrFail($id);

    // Update fields
    $gallery->describe_photo = $request->input('describe_photo');
    $gallery->userid = $request->input('userid');
    $gallery->like_post = $request->input('like_post');

    // Handling file upload
    if ($request->hasFile('gambar')) {
        $image = $request->file('gambar');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Save updated image to storage
        Storage::putFileAs('public/img', $image, $imageName);

        // Delete old image from storage (optional)
        Storage::delete('public/img/' . $gallery->gambar);

        // Update image name in the database
        $gallery->gambar = $imageName;
    }

    $gallery->save();

    return redirect()->route('galeriku')->with('success', 'Gambar berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the gallery entry by ID
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('galeriku')->with('error', 'Gambar tidak ditemukan');
        }

        // Delete the associated image file from storage
        $imagePath = 'public/img/' . $gallery->gambar;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Delete the gallery entry from the database
        $gallery->delete();

        return redirect()->route('galeriku')->with('success', 'Gambar berhasil dihapus');
    }
}
