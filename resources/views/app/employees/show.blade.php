@extends('layouts.main')

@section('content')
    @if($employee)
        <div class="container">
            <div class="card-body">
                <h5 class="card-title">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Email: {{ $employee->email }}</li>
                <li class="list-group-item">Phone: {{ $employee->phone }}</li>
                <li class="list-group-item">Company: {{ $employee->company->name }}</li>
            </ul>
        </div>
    @endif
@endsection
