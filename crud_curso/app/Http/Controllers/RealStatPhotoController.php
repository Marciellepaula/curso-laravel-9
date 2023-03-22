<?php

namespace App\Http\Controllers;

use App\Models\RealStatPhoto;
use Illuminate\Http\Request;

class RealStatPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = $request->all();
        $images = $request->file('images');


        try {
            $realState = RealStatPhoto::create($data);

            if (isset($data['categories']) && count($data['categories'])) {
                $realState->categories()->sync($data['categories']);
            }
            if ($images) {
                foreach ($images as $image)
                    $path = $image->store('images', 'public');
            }


            return response()->json([
                'data' => ['imovel inserido']
            ]);
        } catch (\Exception $e) {
            // Handle the exception here
        }
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
