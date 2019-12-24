<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => [
    //         'index', 'show'
    //     ]]);
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => [
                'required',
                'file',
                'filled',
                'image',
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(null, 500);
        }

        $path = $request->file->store('uploads', 'public');

        $picture = Picture::create([
            'path'  =>  '/storage/' . $path,
            'mime'  =>  $request->file->getMimeType(),
            'size'  =>  $request->file->getSize()
        ]);

        $request->session()->put('post_picture', $picture->id);

        return response()->json(
            [
                'id'    =>  $picture->id,
                'path'  =>  $picture->path
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        if (!Storage::disk('public')->delete($picture->path)) {
            return response()->json(
                ['result' => true],
                200
            );
        }
        if ($picture->delete()) {
            return response()->json(
                ['result' => true],
                200
            );
        }
    }
}
