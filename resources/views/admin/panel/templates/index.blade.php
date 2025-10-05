@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Manage Templates</h2>
        <a href="{{ route('admin.templates.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill me-2"></i>Create New Template
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Badge</th>
                            <th>Demo URL</th>
                            <th>Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($templates as $template)
                            <tr>
                                <td>{{ $template->name }}</td>
                                <td>Rp{{ number_format($template->price, 2) }}</td>
                                <td>
                                    @if($template->badge)
                                        <span class="badge bg-info">{{ $template->badge }}</span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if($template->demo_url)
                                        <a href="{{ $template->demo_url }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-eye-fill"></i> View Demo
                                        </a>
                                    @else
                                         <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>{{ $template->created_at->format('M d, Y') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.templates.destroy',$template->id) }}" method="POST">
                                        <a class="btn btn-sm btn-outline-warning" href="{{ route('admin.templates.edit',$template->id) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $template->id }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                             <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal-{{ $template->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the template: <strong>{{ $template->name }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.templates.destroy',$template->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No templates found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
             <div class="d-flex justify-content-center">
                {{ $templates->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
