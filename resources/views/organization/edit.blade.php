<!-- Edit Contact Form Modal -->
<div class="modal fade" id="editOrganization{{ $organization->id }}" tabindex="-1" role="dialog" aria-labelledby="editContact{{ $contact->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOrganization{{ $organization->id }}Label">Edit Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your edit form content goes here -->
                {{-- Example form --}}
                <form action="{{ route('organizations.update', $organization->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Form fields go here -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
