<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request) {
        $cart = $request->session()->get('cart', []);
        return view('medicines.checkout', compact('cart'));
    }

    // This method handles the form submission (POST)
    public function store(Request $request) {
        // Logic for processing checkout form
    }

    // This method is for the confirmation page
    public function confirmation() {
        // Logic for displaying confirmation page
    }
}
