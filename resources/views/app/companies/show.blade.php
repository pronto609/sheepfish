@extends('layouts.main')

@section('content')
    @if($company)
        <div class="container">
            <img class="card-img-top" src="{{ asset('storage/'.$company->logo) }}" width="200px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $company->name }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Email: {{ $company->email }}</li>
                <li class="list-group-item">Website: {{ $company->website }}</li>
            </ul>
        </div>
    @endif
@endsection
