@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Organization List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('organizations.create') }}" class="btn btn-success">Add Organization</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Industry</th>
                    <th>Size</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($organizations as $organization)
                    <tr>
                        <td>{{ $organization->id }}</td>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->industry }}</td>
                        <td>{{ $organization->orgsize }}</td>
                        <td>
                            <!-- Edit Form Button -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editOrganization{{ $organization->id }}">
                                Edit
                            </button>
                            @include('organization.edit_form', ['organization' => $organization])

                            <!-- Delete Form Button -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteOrganization{{ $organization->id }}">
                                Delete
                            </button>
                            @include('organization.delete_form', ['organization' => $organization])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No organizations found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
