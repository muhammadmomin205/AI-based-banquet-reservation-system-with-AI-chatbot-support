<?php

namespace App\Http\Controllers\manager;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\manager\BanquetImage;

class BanquetImagesController extends Controller
{
    public function index()
    {
        return view('manager.pages.banquet-images');
    }

    public function uploadBanquetImages(Request $request)
    {
        $request->validate([
            'banquet_images' => 'required|array|size:8',
            'banquet_images.*' => 'required|image|mimes:jpeg,png,jpg|max:1048',
        ]);
        $columns = [
            'profile_image',
            'cover_image',
            'img_1',
            'img_2',
            'img_3',
            'img_4',
            'img_5',
            'img_6'
        ];

        $data = [];

        foreach ($request->file('banquet_images') as $index => $image) {
            if ($image) {
                $filename = Str::random(10) . "." . $image->getClientOriginalExtension();
                $image->move(public_path('manager/images/banquet_images'), $filename);

                $columnName = $columns[$index];
                $data[$columnName] = $filename;
            }
        }
        BanquetImage::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Image Uploaded Successfully'
        ]);
    }
}
