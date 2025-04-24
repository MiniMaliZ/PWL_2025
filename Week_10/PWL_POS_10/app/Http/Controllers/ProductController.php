<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodBeverage()
    {
        return view('products')
        ->with('title', 'Food and Beverage')
        ->with('name', 'Ayam Goreng')
        ->with('price', 'Rp. 10.0000');
    }

    public function beautyHealth()
    {
        return view('products')
        ->with('title', 'Beauty and Health')
        ->with('name', 'Skin Care')
        ->with('price', 'Rp. 35.0000');
    }

    public function homeCare()
    {
        return view('products')
        ->with('title', 'Home Care')
        ->with('name', 'Sapu')
        ->with('price', 'Rp. 15.0000');
    }

    public function babykid()
    {
        return view('products')
        ->with('title', 'Baby and Kid')
        ->with('name', 'Home Care')
        ->with('price', 'Rp. 20.0000');
    }
}
