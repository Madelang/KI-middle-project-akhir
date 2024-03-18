@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customers</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Create customer</a>
    @if(Session::get('success'))
    <p class="text-success text-bold">
        {{ Session::get('success') }}
    </p>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <th scope="row">{{ $customer->id }}</th>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone}}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <ul class="pagination">
        @if($customers->currentPage() > 1)
        <li class="page-item">
            <a class="page-link" href="{{ url('customers?page='.($customers->currentPage() - 1)) }}"
                tabindex="-1">Previous</a>
        </li>
        @else
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>
        @endif

        @for($i = 0; $i < $customers->lastPage(); $i++)
            @if($customers->currentPage() === $i + 1)
            <li class="page-item active">
                <a class="page-link">{{ $i + 1 }}</a>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ url('customers?page='.($i + 1)) }}">{{ $i + 1 }}</a>
            </li>
            @endif
            @endfor

            @if($customers->currentPage() < $customers->lastPage())
                <li class="page-item">
                    <a class="page-link" href="{{ url('customers?page='.($customers->currentPage() + 1)) }}">Next</a>
                </li>
                @else
                <li class="page-item disabled">
                    <span class="page-link">Next</span>
                </li>
                @endif
    </ul>
</div>
@endsection