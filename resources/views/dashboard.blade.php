@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1>Dashboard</h1>
            
            <!-- Add Domain Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Add New Domain</h5>
                    <form action="{{ route('domains.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-8">
                            <input type="text" name="domain" class="form-control" placeholder="Enter domain (e.g., example.com)" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Add Domain</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Domains List -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Your Domains</h5>
                    @if($domains->isEmpty())
                        <p class="text-muted">You haven't added any domains yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Domain</th>
                                        <th>Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($domains as $domain)
                                        <tr>
                                            <td>
                                                <form action="{{ route('domains.update', $domain) }}" method="POST" class="domain-edit-form d-none">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="input-group">
                                                        <input type="text" name="domain" value="{{ $domain->domain }}" class="form-control">
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                        <button type="button" class="btn btn-secondary cancel-edit">Cancel</button>
                                                    </div>
                                                </form>
                                                <span class="domain-text">{{ $domain->domain }}</span>
                                            </td>
                                            <td>{{ $domain->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-domain">Edit</button>
                                                <form action="{{ route('domains.delete', $domain) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Edit domain functionality
    document.querySelectorAll('.edit-domain').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            row.querySelector('.domain-text').classList.add('d-none');
            row.querySelector('.domain-edit-form').classList.remove('d-none');
            this.classList.add('d-none');
        });
    });

    // Cancel edit functionality
    document.querySelectorAll('.cancel-edit').forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            row.querySelector('.domain-text').classList.remove('d-none');
            row.querySelector('.domain-edit-form').classList.add('d-none');
            row.querySelector('.edit-domain').classList.remove('d-none');
        });
    });
});
</script>
@endsection
