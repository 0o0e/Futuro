<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
        
        // Start query
        $query = Booking::query();
        
        // Status filter
        if ($request->filled('status')) {
            switch ($request->status) {
                case 'upcoming':
                    $query->where('date', '>', $today);
                    break;
                case 'today':
                    $query->whereDate('date', $today);
                    break;
                case 'past':
                    $query->where('date', '<', $today);
                    break;
            }
        }
        
        // Year filter
        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }
        
        // Quarter filter
        if ($request->filled('quarter')) {
            $quarter = $request->quarter;
            $startMonth = ($quarter - 1) * 3 + 1;
            $endMonth = $quarter * 3;
            
            $query->whereRaw('MONTH(date) >= ? AND MONTH(date) <= ?', [$startMonth, $endMonth]);
        }
        
        // Search filter (naam of email)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        
        // Order by date (newest first)
        $query->orderBy('date', 'asc');
        
        // Get all bookings for grouping (without pagination for quarterly view)
        $allBookings = $query->get();
        
        // Group bookings by quarter
        $bookingsByQuarter = $this->groupByQuarter($allBookings);
        
        // Calculate statistics
        $stats = [
            'total' => Booking::count(),
            'upcoming' => Booking::where('date', '>', $today)->count(),
            'today' => Booking::whereDate('date', $today)->count(),
            'past' => Booking::where('date', '<', $today)->count(),
        ];
        
        // AANGEPAST: Gebruik 'reservations' als view naam (jouw bestandsnaam)
        return view('admin.reservations', [
            'bookingsByQuarter' => $bookingsByQuarter,
            'today' => $today,
            'stats' => $stats,
        ]);
    }
    
    /**
     * Group bookings by quarter
     */
    private function groupByQuarter($bookings)
    {
        $grouped = [];
        
        foreach ($bookings as $booking) {
            $date = Carbon::parse($booking->date);
            $year = $date->year;
            $quarter = $date->quarter;
            
            // Create quarter label
            $quarterLabel = $this->getQuarterLabel($quarter, $year);
            
            if (!isset($grouped[$quarterLabel])) {
                $grouped[$quarterLabel] = [];
            }
            
            $grouped[$quarterLabel][] = $booking;
        }
        
        // Sort by quarter (most recent first)
        krsort($grouped);
        
        return $grouped;
    }
    
    /**
     * Get quarter label
     */
    private function getQuarterLabel($quarter, $year)
    {
        $quarters = [
            1 => 'Q1 (Jan-Mrt)',
            2 => 'Q2 (Apr-Jun)',
            3 => 'Q3 (Jul-Sep)',
            4 => 'Q4 (Okt-Dec)',
        ];
        
        return $year . ' - ' . $quarters[$quarter];
    }
    
    /**
     * Show single booking
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        // AANGEPAST: Gebruik 'bookingShow' als view naam
        return view('admin.bookingShow', compact('booking'));
    }
    
    /**
     * Edit booking
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        // AANGEPAST: Gebruik 'bookingEdit' als view naam
        return view('admin.bookingEdit', compact('booking'));
    }
    
    /**
     * Update booking
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'date' => 'required|date',
            // Voeg meer validatie toe indien nodig
        ]);
        
        $booking->update($validated);
        
        return redirect()->route('admin.bookings.index')
            ->with('success', 'Boeking succesvol bijgewerkt!');
    }
    
    /**
     * Delete booking
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        
        return redirect()->route('admin.bookings.index')
            ->with('success', 'Boeking succesvol verwijderd!');
    }
}