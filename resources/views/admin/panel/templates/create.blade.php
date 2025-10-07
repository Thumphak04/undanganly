@extends('admin.layouts.app')

@section('title', 'Create New Template')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary mb-0">Create New Template</h2>
        <a class="btn btn-secondary" href="{{ route('admin.templates.index') }}">
            <i class="bi bi-arrow-left me-2"></i>Back to List
        </a>
    </div>

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
            {{-- Main Content Column --}}
            <div class="col-lg-8">
                {{-- Main Details Card --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Main Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter template name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea class="form-control" style="height:100px" name="description" id="description" placeholder="A short description for the template card and SEO">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            {{-- DIUBAH UNTUK CKEDITOR --}}
                            <label for="detail_templates" class="form-label">Detail Description & Features</label>
                            <textarea class="form-control" name="detail_templates" id="detail_templates" style="height: 250px">{{ old('detail_templates') }}</textarea>
                            <small class="form-text text-muted">Use this editor to write the full description, features list, and other details that will appear on the template detail page.</small>
                        </div>
                    </div>
                </div>

                {{-- SEO & Social Media Card --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">SEO & Social Media</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="SEO title for search engines" value="{{ old('meta_title') }}">
                            <small class="form-text text-muted">If empty, the template name will be used.</small>
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="A short description for SEO (max 160 characters). If empty, the Short Description will be used.">{{ old('meta_description') }}</textarea>
                        </div>
                         <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="keyword1, keyword2, keyword3" value="{{ old('meta_keywords') }}">
                             <small class="form-text text-muted">Comma-separated keywords.</small>
                        </div>
                        <hr>
                        <h6 class="text-muted">Social Media Preview (Open Graph)</h6>
                         <div class="mb-3">
                            <label for="og_title" class="form-label">Social Media Title</label>
                            <input type="text" name="og_title" class="form-control" id="og_title" placeholder="Title shown when sharing on social media" value="{{ old('og_title') }}">
                            <small class="form-text text-muted">If empty, the Meta Title will be used.</small>
                        </div>
                         <div class="mb-3">
                            <label for="og_description" class="form-label">Social Media Description</label>
                            <textarea class="form-control" name="og_description" id="og_description" rows="3" placeholder="Description shown when sharing on social media">{{ old('og_description') }}</textarea>
                             <small class="form-text text-muted">If empty, the Meta Description will be used.</small>
                        </div>
                         <div class="mb-3">
                            <label for="og_image" class="form-label">Social Media Image</label>
                            <input class="form-control" type="file" id="og_image" name="og_image">
                            <small class="form-text text-muted">Recommended size: 1200x630px. If empty, the Thumbnail will be used.</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Column --}}
            <div class="col-lg-4">
                {{-- Organization Card --}}
                <div class="card shadow-sm mb-4">
                     <div class="card-header">
                        <h5 class="mb-0">Organization</h5>
                    </div>
                    <div class="card-body">
                         <div class="mb-3">
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
                         <div class="mb-3">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price" class="form-control" id="price" placeholder="100000" step="1000" value="{{ old('price') }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="badge" class="form-label">Badge</label>
                            <input type="text" name="badge" class="form-control" id="badge" placeholder="e.g., New, Popular" value="{{ old('badge') }}">
                        </div>
                    </div>
                </div>

                {{-- URLs & Thumbnail Card --}}
                 <div class="card shadow-sm mb-4">
                     <div class="card-header">
                        <h5 class="mb-0">Links & Images</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="preview_url" class="form-label">Preview URL</label>
                            <input type="url" name="preview_url" class="form-control" id="preview_url" placeholder="https://example.com/preview" value="{{ old('preview_url') }}">
                        </div>
                        <div class="mb-3">
                            <label for="demo_url" class="form-label">Live Demo URL</label>
                            <input type="url" name="demo_url" class="form-control" id="demo_url" placeholder="https://example.com/demo" value="{{ old('demo_url') }}">
                        </div>
                         <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                            <small class="form-text text-muted">Main image for the template card.</small>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle-fill me-2"></i>Create Template
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
{{-- Mengaktifkan kembali CKEditor --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('detail_templates');
</script>
@endpush

