@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ $formName }}</h2>
        <form method="POST"
              action=
                  @if(isset($company))
                    "{{ route('companies.update', ['company' => $company->id]) }}"
        @else
            "{{ route('companies.create') }}"
        @endif
        enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Company Name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                placeholder="Enter company name"
                value="{{ old('name') ?? (isset($company) ? $company->name : '') }}"
            >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Company Email</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                placeholder="Enter company email"
                value="{{ old('email') ?? (isset($company) ? $company->email : '') }}"
            >
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            @if(isset($company) && $company->logo)
                <img src="{{ asset('storage/logo.png') }}" width="50px" height="50px">
            @endif
            <label for="logo">Load Company Logo</label>
            <input
                type="file"
                class="form-control-file @error('email') is-invalid @enderror"
                id="logo"
            >
                @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group">
            <label for="website">Company Website</label>
            <input
                type="text"
                class="form-control @error('website') is-invalid @enderror"
                id="website"
                placeholder="Enter company website"
                value="{{ old('website') ?? (isset($company) ? $company->website : '') }}"
            >
            @error('website')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
