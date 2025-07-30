<?php

namespace App\Http\Controllers\manager;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\customer\Banquet;
use App\Http\Controllers\Controller;
use App\Models\manager\BanquetImage;
use Illuminate\Support\Facades\Auth;

class BanquetImageController extends Controller
{
    public function banquetImages()
    {
        return view('manager.pages.banquet-image', ['pageTitle' => 'Banquet Images']);
    }

    public function uploadBanquetImages(Request $request)
    {
        $request->validate([
            'banquet_images' => 'required|array|size:8',
            'banquet_images.*' => 'required|image|mimes:jpeg,png,jpg|max:1048',
        ], [
            'banquet_images.required' => 'All 8 images are required.',
            'banquet_images.size' => 'You must upload exactly 8 images.',

            'banquet_images.0.required' => 'Profile Image is required.',
            'banquet_images.0.image' => 'Profile Image must be an image file.',
            'banquet_images.0.mimes' => 'Profile Image must be a jpeg, png, or jpg.',
            'banquet_images.0.max' => 'Profile Image must not be larger than 1MB.',

            'banquet_images.1.required' => 'Cover Image is required.',
            'banquet_images.1.image' => 'Cover Image must be an image file.',
            'banquet_images.1.mimes' => 'Cover Image must be a jpeg, png, or jpg.',
            'banquet_images.1.max' => 'Cover Image must not be larger than 1MB.',

            'banquet_images.2.required' => 'Image 1 is required.',
            'banquet_images.2.image' => 'Image 1 must be an image file.',
            'banquet_images.2.mimes' => 'Image 1 must be a jpeg, png, or jpg.',
            'banquet_images.2.max' => 'Image 1 must not be larger than 1MB.',

            'banquet_images.3.required' => 'Image 2 is required.',
            'banquet_images.3.image' => 'Image 2 must be an image file.',
            'banquet_images.3.mimes' => 'Image 2 must be a jpeg, png, or jpg.',
            'banquet_images.3.max' => 'Image 2 must not be larger than 1MB.',

            'banquet_images.4.required' => 'Image 3 is required.',
            'banquet_images.4.image' => 'Image 3 must be an image file.',
            'banquet_images.4.mimes' => 'Image 3 must be a jpeg, png, or jpg.',
            'banquet_images.4.max' => 'Image 3 must not be larger than 1MB.',

            'banquet_images.5.required' => 'Image 4 is required.',
            'banquet_images.5.image' => 'Image 4 must be an image file.',
            'banquet_images.5.mimes' => 'Image 4 must be a jpeg, png, or jpg.',
            'banquet_images.5.max' => 'Image 4 must not be larger than 1MB.',

            'banquet_images.6.required' => 'Image 5 is required.',
            'banquet_images.6.image' => 'Image 5 must be an image file.',
            'banquet_images.6.mimes' => 'Image 5 must be a jpeg, png, or jpg.',
            'banquet_images.6.max' => 'Image 5 must not be larger than 1MB.',

            'banquet_images.7.required' => 'Image 6 is required.',
            'banquet_images.7.image' => 'Image 6 must be an image file.',
            'banquet_images.7.mimes' => 'Image 6 must be a jpeg, png, or jpg.',
            'banquet_images.7.max' => 'Image 6 must not be larger than 1MB.',
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
        $manager = Auth::guard('banquet_manager')->user();

        $banquet = Banquet::where('manager_id', $manager->id)->first();

        if ($banquet) {
            $banquetImages = BanquetImage::where('banquet_id', $banquet->id)->first();

            if ($banquetImages) {
                $banquetImages->update($data);
            }
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Image Uploaded Successfully'
        ]);
    }
}
