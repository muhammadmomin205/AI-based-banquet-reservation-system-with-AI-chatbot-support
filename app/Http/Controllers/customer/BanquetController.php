<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanquetController extends Controller
{
    public function banquets()
    {
        return view('customer.pages.banquet', ['pageTitle' => 'Banquets']);
    }
}
