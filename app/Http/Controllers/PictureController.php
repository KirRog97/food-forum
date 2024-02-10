<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => [
                    'required',
                    'file',
                    'filled',
                    'image',
                ],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        }

        $path = $request->file->store('uploads', 'public');

        $picture = Picture::create(
            [
                'path'  =>  '/storage/' . $path,
                'mime'  =>  $request->file->getMimeType(),
                'size'  =>  $request->file->getSize()
            ]
        );

        $request->session()->put('picture_id', $picture->id);

        return response()->json(
            [
                'id'    =>  $picture->id,
                'path'  =>  $picture->path
            ],
            200
        );
    }

    /**
     * Update the specified specified in storage and database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => [
                    'required',
                    'file',
                    'filled',
                    'image',
                ],
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => 'Sended file check faild'], 500);
        }

        try {
            Storage::delete($picture->path);

            // delete "storage/" in string
            // $oldPicturePath = substr($picture->path, 8);
            // Storage::disk('public')->delete($oldPicturePath);

            $path = $request->file->store('uploads', 'public');
            $picture->update(
                [
                    'path'  =>  '/storage/' . $path,
                    'mime'  =>  $request->file->getMimeType(),
                    'size'  =>  $request->file->getSize()
                ]
            );
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

    public function destroy(Picture $picture): JsonResponse
    {
        if (!Storage::disk('public')->delete(substr($picture->path, 8))) {
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
