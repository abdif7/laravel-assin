@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Add Organization</h2>

        <!-- Your add organization form goes here -->
        <form method="post" action="{{ route('organizations.store') }}">
            @csrf
            <!-- Add your form fields for organization creation here -->

            <button type="submit" class="btn btn-primary">Add Organization</button>
        </form>
    </div>
@endsection
