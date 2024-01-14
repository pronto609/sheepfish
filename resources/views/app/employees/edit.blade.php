@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>{{ $formName }}</h2>
        <form method="POST"
              action=
                      @if(isset($employee))
                        "{{ route('employees.update', ['employee' => $employee->id]) }}"
            @else
                "{{ route('employees.store') }}"
            @endif
        >
            @csrf
            @if(isset($employee))
                {{ method_field('PUT') }}
            @endif
            <div class="form-group">
                <label for="first_name">Employee First Name</label>
                <input
                    type="text"
                    name="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                    id="first_name"
                    placeholder="Enter first name"
                    value="{{ old('first_name') ?? (isset($employee) ? $employee->first_name : '') }}"
                >
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Employee Last Name</label>
                <input
                    type="text"
                    name="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    id="last_name"
                    placeholder="Enter last name"
                    value="{{ old('last_name') ?? (isset($employee) ? $employee->last_name : '') }}"
                >
                @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    placeholder="Enter company email"
                    value="{{ old('email') ?? (isset($employee) ? $employee->email : '') }}"
                >
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Phone</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    id="phone"
                    placeholder="Phone"
                    value="{{ old('phone') ?? (isset($employee) ? $employee->phone : '') }}"
                >
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="website">Company</label>
                <select
                    name="company_id"
                    class="form-control single-select @error('phone') is-invalid @enderror"
                    id="company_id"
                    sele="{{ old('company_id') ?? (isset($employee) ? $employee->company_id : '') }}"
                >
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
