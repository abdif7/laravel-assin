@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Contact List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('contacts.create') }}" class="btn btn-success">Add Contact</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Job Title</th>
                    <th>Organization</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->first_name }}</td>
                        <td>{{ $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->job_title }}</td>
                        <td>{{ $contact->organization->name }}</td>
                        <td>
                            @if($contact->image)
                                <img src="{{ asset('images/' . $contact->image) }}" alt="Contact Image" width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
            
                            

                            <!-- Edit Form Button -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editContact{{ $contact->id }}">
                                Edit 
                            </button>
                            @include('contact.edit_form', ['contact' => $contact])

                            <!-- Delete Form Button -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteContact{{ $contact->id }}">
                                Delete 
                            </button>
                            @include('contact.delete_form', ['contact' => $contact])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No contacts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
