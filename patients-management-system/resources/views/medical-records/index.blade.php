@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Medical Records</h1>

    @if(count($medicalRecords) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicalRecords as $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->patient_name }}</td>
                        <td>{{ $record->description }}</td>
                        <td>{{ $record->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No medical records found.</p>
    @endif
</div>
@endsection
