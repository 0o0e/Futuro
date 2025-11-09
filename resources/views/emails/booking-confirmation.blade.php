<h2>Uw reservering is bevestigd!</h2>

<p>Beste {{ $booking->name }},</p>

<p>Bedankt voor uw reservering. Hier zijn de details:</p>

<ul>
    <li>Service: {{ $booking->service }}</li>
    <li>Datum: {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</li>
    <li>Begin Tijd: {{ $booking->time_start }}</li>
    @if($booking->time_end)
    <li>Eind Tijd: {{ $booking->time_end }}</li>
    @endif
    @if($booking->arrangement)
    <li>Arrangement:
    @php
        if($booking->arrangement) {
            $selected = collect($booking->arrangement->toArray())
                        ->only(['prosecco','picnic','olala','bistro','barca'])
                        ->filter(fn($v) => $v == 1)
                        ->keys()
                        ->first();
        } else {
            $selected = null;
        }
    @endphp

    {{ $selected ? ucfirst($selected) : 'Geen' }}
</li>

    @endif
    <li>Aantal Personen: {{ $booking->people }}</li>
    <li>Totaal Bedrag: €{{ $booking->price }}</li>
</ul>

<p>U kunt betalen via: </p>

<p>Bedankt voor uw reservering!</p>
