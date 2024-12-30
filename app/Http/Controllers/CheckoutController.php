<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request) {
        $cart = $request->session()->get('cart', []);
        return view('medicines.checkout', compact('cart'));
    }

    public function store(Request $request) {

    }

    public function confirmation() {

    }
}
