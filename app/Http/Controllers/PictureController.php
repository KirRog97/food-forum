<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
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
            return response()->json(['message' => 'Sended file check faild'], 500);
        }

        try {
            // delete "storage/" in string

            Storage::delete($picture->path);
            // $oldPicturePath = substr($picture->path, 8);
            // Storage::disk('public')->delete($oldPicturePath);
            $path = $request->file->store('uploads', 'public');
            $picture->update([
                'path'  =>  '/storage/' . $path,
                'mime'  =>  $request->file->getMimeType(),
                'size'  =>  $request->file->getSize()
            ]);
        } catch (\Throwable $exepction) {
            return response()->json(['message' => $exepction->getMessage()], 500);
        }

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
