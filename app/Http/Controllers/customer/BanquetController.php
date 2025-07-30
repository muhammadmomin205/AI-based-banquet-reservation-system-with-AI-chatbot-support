<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\customer\BanquetManager;

class BanquetController extends Controller
{
    public function banquets()
    {
        $banquets = BanquetManager::with('banquet.images')->get();

        return view('customer.pages.banquet', [
            'pageTitle' => 'Banquets',
            'banquets' => $banquets
        ]);
    }
}
