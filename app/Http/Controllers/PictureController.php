<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    public function store(Request $request) : JsonResponse
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
                'path' => '/storage/' . $path,
                'mime' => $request->file->getMimeType(),
                'size' => $request->file->getSize()
            ]
        );

        $request->session()->put('picture_id', $picture->id);

        return response()->json(
            [
                'id' => $picture->id,
                'path' => $picture->path
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
    public function update(Request $request, Picture $picture) : JsonResponse
    {
        // TODO: Move Validator to Requests
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

        try {
            // TODO: Refactor that code... use Destroy method or whatever

            // delete "storage/" in string
            $oldPicturePath = substr($picture->path, 8);
            Storage::disk('public')->delete($oldPicturePath);

            $newPicturePath = $request->file->store('avatars', 'public');
            $picture->update(
                [
                    'path' => '/storage/' . $newPicturePath,
                    'mime' => $request->file->getMimeType(),
                    'size' => $request->file->getSize()
                ]
            );

            return response()->json([
                'message' => "Picture updated successfully",
                'path' => '/storage/' . $newPicturePath
            ], 200);
        } catch (\Throwable $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function destroy(Picture $picture) : JsonResponse
    {
        $cleanedPath = substr($picture->path, 8);
        if (Storage::disk('public')->exists($cleanedPath)) { {
                Storage::disk('public')->delete($cleanedPath);
                return response()->json([
                    'message' => "Picture deleted successfully",
                ], 200);
            }
        } else {
            return response()->json([
                'message' => "Picture wasn't delete",
            ], 500);
        }
    }
}
