@extends('layouts.app')

@section('content')
<h1>Add Patient</h1>
<form method="POST" action="{{ route('patients.store') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="address">Address:</label>
        <textarea name="address" required></textarea>
    </div>
    <div>
        <label for="contact">Contact:</label>
        <input type="text" name="contact" required>
    </div>
    <button type="submit">Add Patient</button>
</form>
@endsection
