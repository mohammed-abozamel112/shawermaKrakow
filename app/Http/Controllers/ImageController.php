<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageCollection;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $images = new ImageCollection(Image::all());
            return response()->json([
                $images,
            ]);
        } catch (Exception $e) {
            return response()->json(
                ['error' => 'An error occurred while trying to retrieve images.'], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        /*  // Save image to database and get its id
         $imageId = Image::create($request->validated())->id;
         // Return the saved image with its id
         return response()->json(['data' => Image::findOrFail($imageId)]); */
        try {
            $image = Image::create([
                "title" => $request->title,
                "url" => Storage::putFile('images',$request->file('url')),/*  $request->file('url')->store("images/main") */
            ]);
            return response()->json([$image]);
        } catch (Exception $e) {
            return response()->json(["error" => "Error uploading file"], 422);
        }

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        try {
            $image->update([
                "title" => $request->input("title"),
                "url" => $request->input("url"),
            ]);
        } catch (Exception $e) {
            return response()->json(["error" => "Failed to update image."], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
