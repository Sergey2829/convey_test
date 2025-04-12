@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1>Users</h1>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Domains</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->domains->isNotEmpty())
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($user->domains as $domain)
                                                        <li>{{ $domain->domain }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="text-muted">No domains</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 