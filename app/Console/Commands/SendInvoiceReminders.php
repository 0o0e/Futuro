<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingReminderMail;
use Carbon\Carbon;

class SendInvoiceReminders extends Command
{
    protected $signature = 'invoices:send-reminders';
    protected $description = 'Send reminders for unpaid invoices';

    public function handle()
    {
        $today = Carbon::today();

$invoices = Invoice::where('status', 'onbetaald')->get();

        foreach ($invoices as $invoice) {
            $booking = $invoice->booking;
            $cruiseDate = Carbon::parse($booking->date);

            // First reminder: 7 days after cruise
            if ($cruiseDate->copy()->addDays(7)->isSameDay($today) &&
                !str_contains($invoice->notes, 'Eerste herinnering')) {
$this->info("Invoice {$invoice->invoice_number}, Booking ID {$booking->id}, Cruise Date: {$booking->date}, Email: {$booking->email}");

                Mail::to($booking->email)->send(new BookingReminderMail($booking));

                $invoice->notes .= "Eerste herinnering verzonden op ".now()."\n";
                $invoice->save();

                $this->info("Eerste herinnering gestuurd voor invoice {$invoice->invoice_number}");
            }

            // Second reminder: 14 days after cruise
            if ($cruiseDate->copy()->addDays(14)->isSameDay($today) &&
                !str_contains($invoice->notes, 'Tweede herinnering')) {

                Mail::to($booking->email)->send(new BookingReminderMail($booking));

                $invoice->notes .= "Tweede herinnering verzonden op ".now()."\n";
                $invoice->save();

                $this->info("Tweede herinnering gestuurd voor invoice {$invoice->invoice_number}");
            }
        }
    }
}
