<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Arrangement;
use App\Models\WatertaxiRoute;
use App\Models\Invoice;
use App\Mail\BookingConfirmationMail;
use App\Models\DiscountCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $step = $request->input('step', 1);
        $watertaxiRoutes = WatertaxiRoute::all();

        if ($request->isMethod('post')) {

            if ($step == 1) {
                session(['service' => $request->service , 'people' => $request->people]);

                if ($request->service == 'Watertaxi') {
                    $request->validate([
                        'watertaxi_route_id' => 'required|exists:watertaxi_routes,id',
                    ]);
                    session(['watertaxi_route_id' => $request->watertaxi_route_id]);
                }

                if ($request->service && strtolower($request->service) === 'vaardebon') {
                    $step = "2_vaardebon";
                } else {
                    $step = 2;
                }
            }
            elseif ($step == 2) {
                $service = session('service');

                if ($service == 'Watertaxi') {
                    $request->validate([
                        'date' => 'required|date',
                        'time_start' => 'required',
                    ]);

                    session([
                        'date' => $request->date,
                        'time_start' => $request->time_start,
                        'time_end' => null
                    ]);


                    $route = WatertaxiRoute::find(session('watertaxi_route_id'));
                    if ($route) {
                        session(['price' => $route->price]);
                    }


                    $step = 4;
                } else {
                    $request->validate([
                        'date' => 'required|date',
                        'time_start' => 'required',
                        'time_end' => 'required|after:time_start',
                    ]);
                    session([
                        'date' => $request->date,
                        'time_start' => $request->time_start,
                        'time_end' => $request->time_end,
                    ]);

                    $step = 3;
                }
            }


            elseif ($step == "2_vaardebon") {
                $request->validate([
                    'hours' => 'required|string',
                ]);

                $hours = $request->hours;
                if (!in_array($hours, [1,2,3])){
                    return back()->withErrors([$hours => 'ongeldige duur gekozen']);
                }

                session(['vb_hours' => $hours]);
                $step = '3_vaardebon';
            }
            elseif ($step == '3_vaardebon') {
                session(['vb_arrangement' => $request->arrangement ?? null]);

                // $prices = $this->calculatePrice(session()->all());
                // session([
                //     'service_price' => $prices['service'],
                //     'arrangement_price' => $prices['arrangement'],
                //     'price' => $prices['total']
                // ]);

                $step = '4_vaardebon';

            }
            elseif($step == '4_vaardebon'){
                $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|string',
                ]);

                $hours = session('vb_hours', 1);
                $arrangement = session('vb_arrangement', null);

                $hourprices = [
                    1 => 175.00,
                    2 => 330.00,
                    3 => 470.00,
                ];

                $arrangementPrices = [
                    'prosecco' => 15,
                    'picnic' => 20,
                    'olala' => 18,
                    'bistro' => 22,
                    'barca' => 25,
                    'stadswandeling' => 12,
                ];

                $base = $hourPrices[$hours] ?? $hourprices[1];
                $arrPrice = ($arrangement && isset($arrangementPrices[$arrangement])) ? $arrangementPrices[$arrangement] : 0;
                $totalAmount = round($base + $arrPrice, 2);

                do {
                    $code = Str::upper(Str::random(10));
                    $exists = DB::table('discount_codes')->where('code', $code)->exists();
                } while ($exists);



                DiscountCode::create([
                    'code' => $code,
                    'amount' => $totalAmount,
                    'is_used' => false,
                    'hours' => $hours,
                    'arrangement' => $arrangement,
                    'purchaser_name' => $request->name,
                    'purchaser_email' => $request->email,
                ]);


                $step = 5;

            }
            elseif ($step == 3) {
                session([
                    'has_table' => $request->arrangement === 'has_table' ? 1 : 0,
                    'arrangement' => $request->arrangement === 'has_table' ? null : $request->arrangement,
                ]);

                $prices = $this->calculatePrice(session()->all());
                session([
                    'service_price' => $prices['service'],
                    'arrangement_price' => $prices['arrangement'],
                    'price' => $prices['total']
                ]);


                $step = 4;
            }

            elseif ($step == 4) {
                session()->put([
                    'name' => $request->name,
                    'email' => $request->email,
                    'opmerking' => $request->opmerking,
                    // 'people' => $request->people,
                    'address' => $request->address,
                    'city' => $request->city,
                    'postcode' => $request->postcode,
                    'phone' => $request->phone,
                ]);


                $data = session()->only([
                    'service',
                    'date',
                    'time_start',
                    'time_end',
                    'arrangement',
                    'name',
                    'email',
                    'opmerking',
                    'watertaxi_route_id',
                    'people',
                    'has_table',
                    'phone',
                    'price',
                    'address',
                    'city',
                    'postcode',
                ]);


                // $price = $this->calculatePrice($data);



                $booking = Booking::create([
                    'service' => $data['service'],
                    'date' => $data['date'],
                    'time_start' => $data['time_start'],
                    'time_end' => $data['time_end'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'comment' => $data['opmerking'],
                    'watertaxi_route_id' => session('watertaxi_route_id') ?? null,
                    'people' => $data['people'],
                    'has_table' => $data['has_table'] ?? 0,
                    'price' => $data['price'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'postcode' => $data['postcode'],
                ]);

                Invoice::create([
                    'booking_id' => $booking->id,
                    'invoice_number' => strtoupper(uniqid()),
                    'amount' => $data['price'],
                    'status' => 'onbetaald',
                    'due_date' => date('Y-m-d', strtotime($booking->date . ' +14 days')),
                ]);

                if ($data['service'] !== 'Watertaxi' && !$data['has_table'] && session('arrangement') !== 'none') {
                    $arrangement = [
                        'booking_id' => $booking->id,
                        'prosecco' => 0,
                        'picnic' => 0,
                        'olala' => 0,
                        'bistro' => 0,
                        'barca' => 0,
                        'stadswandeling' => 0,
                    ];

                    if (isset($data['arrangement']) && isset($arrangement[$data['arrangement']])) {
                        $arrangement[$data['arrangement']] = 1;
                    }

                    Arrangement::create($arrangement);
                }

                Mail::to($booking->email)->send(new BookingConfirmationMail($booking));

                $step = 5;
            }
        }

        $data = session()->all();


        $allBookings = Booking::select('date','time_start','time_end')->get();

        // build associative array: 'YYYY-MM-DD' => [ {start:'HH:MM', end:'HH:MM'}, ... ]
        $bookingsByDate = [];
        foreach ($allBookings as $b) {
            $d = $b->date; // make sure stored as 'YYYY-MM-DD'
            if (!isset($bookingsByDate[$d])) $bookingsByDate[$d] = [];
            $bookingsByDate[$d][] = [
                'start' => $b->time_start,
                'end'   => $b->time_end,
            ];
        }

        return view('booking', [
            'data' => $data,
            'step' => $step,
            'watertaxiRoutes' => $watertaxiRoutes,
            'bookingsByDate' => $bookingsByDate,
        ]);
    }

    protected function calculatePrice($data){
        $serviceTotal = 0;
        $arrangementTotal = 0;

        switch ($data['service']) {
            case 'Rondvaart':
                $start = strtotime($data['time_start']);
                $end = strtotime($data['time_end']);
                $minutes = ($end - $start) / 60;
                if ($minutes < 60) $minutes = 60;
                $hours = floor($minutes / 60);
                $serviceTotal = ($hours * 150) - (max(0, $hours - 1) * 10);

                $arrangementPrices = [
                    'prosecco' => 15,
                    'picnic' => 20,
                    'olala' => 18,
                    'bistro' => 22,
                    'barca' => 25,
                    'stadswandeling' => 12,
                ];

                if (!empty($data['arrangement']) && isset($arrangementPrices[$data['arrangement']])) {
                    $arrangementTotal = $arrangementPrices[$data['arrangement']];
                }
                break;

            case 'Watertaxi':
                if (!empty($data['watertaxi_route_id'])) {
                    $route = WatertaxiRoute::find($data['watertaxi_route_id']);
                    if ($route) $serviceTotal = $route->price;
                }
                break;
        }

        return [
            'service' => $serviceTotal,
            'arrangement' => $arrangementTotal,
            'total' => $serviceTotal + $arrangementTotal
        ];
    }


}
