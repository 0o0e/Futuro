<h2>Herinnering voor uw reservering</h2>

<p>Beste {{ $booking->name }},</p>
<a href="">Betaal Nu</a>
<p>U heeft een openstaande factuur voor uw reservering:</p>

<ul>
    <li>Service: {{ $booking->service }}</li>
    <li>Datum: {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</li>
    <li>Aantal Personen: {{ $booking->people }}</li>
    <li>Totaal Bedrag: €{{ $booking->price }}</li>
</ul>

<p>Betaal alstublieft voor {{ \Carbon\Carbon::parse($booking->invoice->due_date)->format('d/m/Y') }}</p>
