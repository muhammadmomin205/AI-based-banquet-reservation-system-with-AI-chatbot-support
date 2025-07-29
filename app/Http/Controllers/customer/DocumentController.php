<?php

namespace App\Http\Controllers\customer;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\customer\Document;

class DocumentController extends Controller
{
    public function uploadDocuments(String $id)
    {
        return view('customer.pages.upload-documents', [
            'id' => $id,
            'pageTitle' => 'Upload documents'
        ]);
    }

    public function saveDocuments(Request $request)
    {
        // Validate uploaded files
        $request->validate([
            'utility_bill' => 'required|file|mimes:jpg,jpeg,png',
            'business_card' => 'required|file|mimes:jpg,jpeg,png',
            'banquet_image' => 'required|file|mimes:jpg,jpeg,png',
            'cnic_front' => 'required|string',
            'cnic_back' => 'required|string',
            'live_selfie' => 'required|string',
        ]);

        // Set destination path
        $destinationPath = public_path('customer/img/document_images');

        // Prepare file names but don't move yet
        $utilityBillName = Str::random(10) . '.' . $request->utility_bill->getClientOriginalExtension();
        $businessCardName = Str::random(10) . '.' . $request->business_card->getClientOriginalExtension();
        $banquetImageName = Str::random(10) . '.' . $request->banquet_image->getClientOriginalExtension();

        // Base64 image names (generate ahead of time)
        $cnicFrontName = Str::random(10) . '.jpg';
        $cnicBackName = Str::random(10) . '.jpg';
        $selfieName = Str::random(10) . '.jpg';

        DB::beginTransaction();

        try {
            // Save DB entry first
            $document = new Document();
            $document->manager_id = $request->manager_id;
            $document->utility_bills = $utilityBillName;
            $document->business_card = $businessCardName;
            $document->banquet_image = $banquetImageName;
            $document->cnic_front = $cnicFrontName;
            $document->cnic_back = $cnicBackName;
            $document->live_selfie = $selfieName;
            $document->save();

            // If DB insert succeeds, move the files
            $request->utility_bill->move($destinationPath, $utilityBillName);
            $request->business_card->move($destinationPath, $businessCardName);
            $request->banquet_image->move($destinationPath, $banquetImageName);

            file_put_contents($destinationPath . '/' . $cnicFrontName, base64_decode(str_replace(' ', '+', str_replace('data:image/jpeg;base64,', '', $request->cnic_front))));
            file_put_contents($destinationPath . '/' . $cnicBackName, base64_decode(str_replace(' ', '+', str_replace('data:image/jpeg;base64,', '', $request->cnic_back))));
            file_put_contents($destinationPath . '/' . $selfieName, base64_decode(str_replace(' ', '+', str_replace('data:image/jpeg;base64,', '', $request->live_selfie))));

            DB::commit();

            return response()->json([
                'success' => 'Document Uploaded Successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Something went wrong. ' . $e->getMessage()
            ], 500);
        }
    }
}
