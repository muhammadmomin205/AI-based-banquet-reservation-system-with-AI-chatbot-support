<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\customer\BanquetManager;

class BanquetDetailController extends Controller
{
    public function banquetsDetails(String $id)
    {
        $manager = BanquetManager::with('banquet.images')->get()->findOrFail($id);

        return view('customer.pages.banquet-detail', [
            'pageTitle' => 'Banquet Details',
            'manager' => $manager
        ]);
    }
}
