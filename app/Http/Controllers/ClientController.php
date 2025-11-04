<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Booking;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.page');
    }

    public function showBooking(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $invoice = Invoice::where('invoice_number', $request->invoice_number)
            ->with('booking')
            ->first();

        if (!$invoice || !$invoice->booking || $invoice->booking->email !== $request->email) {
            return back()->withErrors(['error' => 'Ongeldige combinatie van factuurnummer en e-mail.']);
        }

        return view('client.page', ['booking' => $invoice->booking]);
    }

    public function updateBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'phone' => 'nullable|string',
            'comment' => 'nullable|string',
            'people' => 'nullable|integer|min:1',
        ]);

        $booking->update([
            'phone' => $request->phone,
            'comment' => $request->comment,
            'people' => $request->people,
        ]);

        return back()->with('success', 'Boeking succesvol bijgewerkt!')->with('booking', $booking);
    }
}
