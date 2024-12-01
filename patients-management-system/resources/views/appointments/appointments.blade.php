<!-- resources/views/appointments/index.blade.php -->

@extends('layouts.app') <!-- Extend your layout -->

@section('content1')
<div class="container">
    <h1 class="text-center mb-4">Appointments</h1>

    <!-- Add Appointment Form -->
    <div class="card mb-4">
        <div class="card-header">Add Appointment</div>
        <div class="card-body">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="patient_id" class="form-label">Patient</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        <option value="">-- Select Patient --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                        <option value="">-- Select Doctor --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="appt_date" class="form-label">Date</label>
                    <input type="date" name="appt_date" id="appt_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="appt_time" class="form-label">Time</label>
                    <input type="time" name="appt_time" id="appt_time" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Appointment</button>
            </form>
        </div>
    </div>

    <!-- Display Appointments -->
    <div class="card">
        <div class="card-header">Appointment List</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appointment->patient->name }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->appt_date }}</td>
                            <td>{{ $appointment->appt_time }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $appointment->id }}">Edit</button>

                                <!-- Delete Button -->
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Appointment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="patient_id" class="form-label">Patient</label>
                                                <select name="patient_id" class="form-control" required>
                                                    @foreach($patients as $patient)
                                                        <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                                            {{ $patient->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="doctor_id" class="form-label">Doctor</label>
                                                <select name="doctor_id" class="form-control" required>
                                                    @foreach($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                            {{ $doctor->name }} ({{ $doctor->specialty }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="appt_date" class="form-label">Date</label>
                                                <input type="date" name="appt_date" value="{{ $appointment->appt_date }}" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="appt_time" class="form-label">Time</label>
                                                <input type="time" name="appt_time" value="{{ $appointment->appt_time }}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Appointments Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
