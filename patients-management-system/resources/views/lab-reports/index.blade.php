@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lab Reports</h1>

    @if(count($labReports) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Report Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($labReports as $report)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $report['name'] ?? 'N/A' }}</td>
                        <td>{{ $report['date'] ?? 'N/A' }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No lab reports available.</p>
    @endif
</div>
@endsection
