<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4 text-center">Maak een Reservering</h1>

        <div class="card shadow p-4">
            <form action="#" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input type="text" class="form-control" id="naam" name="naam" placeholder="Jouw naam" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mailadres</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="jij@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="date" class="form-control" id="datum" name="datum" required>
                </div>

                <div class="mb-3">
                    <label for="opmerking" class="form-label">Opmerking</label>
                    <textarea class="form-control" id="opmerking" name="opmerking" rows="3" placeholder="Eventuele opmerkingen..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Verstuur Booking</button>
            </form>
        </div>
    </div>

</body>
</html>
