@extends('layouts.app')

@section('content')
<h1>Patients List</h1>
<a href="{{ route('patients.create') }}" class="btn btn-primary">Add Patient</a>
<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->patient_id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->address }}</td>
            <td>{{ $patient->contact }}</td>
            <td>
                <a href="#" class="btn btn-info">View</a>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
