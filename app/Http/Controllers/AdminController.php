<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gallery;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return view('hal.admin',[
        "title" => "Dashboard Admin"
    ]);
}

public function getGalleryChartData(Request $request)
{
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
dd($startDate);
    $imageData = Gallery::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $labels = $imageData->pluck('month');
    $imageCount = $imageData->pluck('count');

    return response()->json(['labels' => $labels, 'imageCount' => $imageCount]);
}
public function user()
{
    $search = request('search');

    $users = User::when($search, function ($query) use ($search) {
        return $query->where('name', 'like', '%' . $search . '%');
    })->get();

    return view('hal.userdata', [
        "title" => "Userdata",
        "users" => $users,
        "search" => $search,
    ]);
}
    public function regadmin()
    {
        return view ('hal.registeradmin',[
            "title" => "Register Admin",
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
