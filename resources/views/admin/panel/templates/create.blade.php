@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="text-primary mb-4">Create New Template</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.templates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter template name" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Select a category</option>
                            <option value="pernikahan" @selected(old('category') == 'pernikahan')>Pernikahan</option>
                            <option value="ulang_tahun" @selected(old('category') == 'ulang_tahun')>Ulang Tahun</option>
                            <option value="pertunangan" @selected(old('category') == 'pertunangan')>Pertunangan</option>
                            <option value="wisuda" @selected(old('category') == 'wisuda')>Wisuda</option>
                            <option value="lainnya" @selected(old('category') == 'lainnya')>Lainnya</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" style="height:100px" name="description" id="description" placeholder="A short description of the template">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="detail_templates" class="form-label">Template Details</label>
                    <textarea class="form-control" name="detail_templates" id="detail_templates">{{ old('detail_templates') }}</textarea>
                </div>
                
                 <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price" class="form-control" id="price" placeholder="0.00" step="0.01" value="{{ old('price') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="badge" class="form-label">Badge</label>
                        <input type="text" name="badge" class="form-control" id="badge" placeholder="e.g., New, Popular, Featured" value="{{ old('badge') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                        <small class="form-text text-muted">Max file size: 2MB. Allowed types: jpg, png, gif.</small>
                    </div>
                     <div class="col-md-6 mb-3">
                        <label for="preview_url" class="form-label">Preview URL</label>
                        <input type="url" name="preview_url" class="form-control" id="preview_url" placeholder="https://example.com/preview" value="{{ old('preview_url') }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="demo_url" class="form-label">Demo URL</label>
                        <input type="url" name="demo_url" class="form-control" id="demo_url" placeholder="https://example.com/demo" value="{{ old('demo_url') }}">
                    </div>
                </div>

                <div class="mt-3 text-end">
                    <a class="btn btn-secondary" href="{{ route('admin.templates.index') }}">
                         <i class="bi bi-x-circle me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle-fill me-2"></i>Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('detail_templates');
</script>
@endpush

