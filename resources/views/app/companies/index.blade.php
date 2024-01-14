@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('companies.create') }}" class="btn btn-success btn-lg">Create company</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('companies.show', ['company' => $company->id]) }}">{{ $company->name }}</a></td>
                    <td>{{ $company->email }}</td>
                    <td><img src="{{ asset('storage/'.$company->logo) }}" width="50px" height="50px"></td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('companies.edit', ['company'=>$company->id]) }}" class="btn btn-success">Edit</a></li>
                            <form action="{{ route('companies.destroy', ['company'=>$company->id]) }}" method="POST">
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
        {!! $companies->links() !!}
    </div>
@endsection
