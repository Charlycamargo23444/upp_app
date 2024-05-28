<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResources;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return VideoCollection::make(Video::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            'data.attributes.title'=> ['required', 'min:4'],
            'data.attributes.description'=> ['required', 'description'],
            'data.attributes.slug'=> ['required'],
        ]);

        //alamacenar datos
        $video = Video::create([
            'title' => $request->input('data.attributes.title'),
            'description' => $request->input('data.attributes.description'),
            'slug' => $request->input('data.attributes.slug'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
        return new VideoResources($video);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        //
        $video -> delete();
        return response()->json(null, 204);
    }
}
