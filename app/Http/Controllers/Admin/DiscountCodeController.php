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
            'custom_code' => 'nullable|string|max:50|alpha_dash|unique:discount_codes,code',
            'type' => 'required|in:fixed,percentage',
            'amount' => 'required|numeric|min:0.01|max:9999.99',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'max_uses' => 'nullable|integer|min:1'
        ], [
            'custom_code.unique' => 'Deze kortingscode bestaat al',
            'custom_code.alpha_dash' => 'Kortingscode mag alleen letters, cijfers, streepjes en underscores bevatten'
        ]);

        // Als percentage, max 100
        if ($validated['type'] === 'percentage' && $validated['amount'] > 100) {
            return back()->withErrors(['amount' => 'Percentage kan niet hoger zijn dan 100']);
        }

        // Codes met datums zijn automatisch multi-use
        $isMultiUse = !empty($validated['valid_from']) || !empty($validated['valid_until']);

        // Gebruik custom code of genereer een nieuwe
        $codeValue = !empty($validated['custom_code']) 
            ? strtoupper($validated['custom_code']) 
            : DiscountCode::generateUniqueCode();

        $code = DiscountCode::create([
            'code' => $codeValue,
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'valid_from' => $validated['valid_from'] ?? null,
            'valid_until' => $validated['valid_until'] ?? null,
            'is_multi_use' => $isMultiUse,
            'max_uses' => $isMultiUse ? ($validated['max_uses'] ?? null) : null
        ]);

        $typeText = $validated['type'] === 'percentage' ? "{$code->amount}%" : "€{$code->amount}";
        $dateText = '';
        
        if ($code->valid_from && $code->valid_until) {
            $dateText = " (geldig van {$code->valid_from->format('d-m-Y')} t/m {$code->valid_until->format('d-m-Y')})";
        } elseif ($code->valid_from) {
            $dateText = " (geldig vanaf {$code->valid_from->format('d-m-Y')})";
        } elseif ($code->valid_until) {
            $dateText = " (geldig t/m {$code->valid_until->format('d-m-Y')})";
        }

        $useText = $isMultiUse ? ' - Meerdere keren te gebruiken' : ' - Eenmalig te gebruiken';

        return back()->with('success', "Kortingscode gegenereerd: {$code->code} voor {$typeText}{$dateText}{$useText}");
    }

    public function index()
    {
        $codes = DiscountCode::latest()->paginate(20);
        return view('admin.discountCodes', compact('codes'));
    }
}