@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Delete Organization</h2>

        <p>Are you sure you want to delete this organization?</p>

        <!-- Your delete organization form goes here -->
        <form method="post" action="{{ route('organizations.destroy', $organization->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete Organization</button>
        </form>
    </div>
@endsection
