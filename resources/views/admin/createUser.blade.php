@extends('layouts.admin')

<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
@section('title', 'nieuwe gebruiker toevoegen')

@section('content')





<div class="container mt-5" style="max-width: 600px;">
<div class="card shadow-lg border-0 rounded-4">
<div class="card-body p-4">


@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif



<form action="{{ route('admin.user.store') }}" method="POST">
    @csrf

    <div class="mb-3">
    <label for="name" class="form-label">Naam:</label>
    <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email"class="form-control" required>
    </div>


    <div class="mb-3">
    <label for="password" class="form-label">Wachtwoord:</label>
    <input type="password" id="password" name="password" class="form-control">
    </div>


    <div class="mb-3">
    <label for="password_confirmation" class="form-label">Bevestig wachtwoord:</label>
    <input type="password" id="password_confirmation" name="password_confirmation"class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100 mt-3">Gebruiker Aanmaken</button>

</form>



</div>
</div>
</div>

@endsection
