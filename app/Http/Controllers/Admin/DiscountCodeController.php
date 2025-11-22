<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01|max:9999.99'
        ]);

        $code = DiscountCode::create([
            'code' => DiscountCode::generateUniqueCode(),
            'amount' => $validated['amount']
        ]);

        return back()->with('success', "Kortingscode gegenereerd: {$code->code} voor €{$code->amount}");
    }

    public function index()
    {
        $codes = DiscountCode::latest()->paginate(20);
        return view('admin.discountCodes', compact('codes'));
    }
}