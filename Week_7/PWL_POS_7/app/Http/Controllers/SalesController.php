<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function sales()
    {
        return view('sales')
        ->with('name', 'Ayam Goreng')
        ->with('price', 'Rp. 10.0000')
        ->with('amount', '3')
        ->with('total', 'Rp. 30.0000')
        ->with('pay', 'Rp. 50.0000')
        ->with('change', 'Rp. 20.0000');
    }
}
