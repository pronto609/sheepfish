@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-lg">Create employee</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <a href="{{ route('employees.show', ['employee' => $employee->id]) }}">{{ $employee->first_name }} {{ $employee->last_name }}</a>
                    </td>
                    <td>
                        @if($employee->company)
                        <a href="{{ route('companies.show', ['company' => $employee->company->id]) }}">
                            {{ $employee->company->name }}
                        </a>
                        @else
                            none company
                        @endif
                    </td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('employees.edit', ['employee'=>$employee->id]) }}"
                                   class="btn btn-success">Edit</a>
                            </li>
                            <form action="{{ route('employees.destroy', ['employee'=>$employee->id]) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <li class="list-group-item"><button class="btn btn-danger">Delete</button></li>
                            </form>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $employees->links() !!}
    </div>
@endsection
