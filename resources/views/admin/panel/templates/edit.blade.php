@extends('admin.layouts.app')

@section('title', 'Edit Template: ' . $template->name)

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-primary mb-0">Edit Template</h2>
            <p class="text-muted mb-0">Editing: <strong>{{ $template->name }}</strong></p>
        </div>
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

    <form action="{{ route('admin.templates.update', $template->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter template name" value="{{ old('name', $template->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea class="form-control" style="height:100px" name="description" id="description" placeholder="A short description for the template card and SEO">{{ old('description', $template->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="detail_templates" class="form-label">Detail Description & Features</label>
                            <textarea class="form-control" name="detail_templates" id="detail_templates" style="height: 250px">{{ old('detail_templates', $template->detail_templates) }}</textarea>
                            <small class="form-text text-muted">Use this editor to write the full description, features list, and other details.</small>
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
                            <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="SEO title for search engines" value="{{ old('meta_title', $template->meta_title) }}">
                            <small class="form-text text-muted">If empty, the template name will be used.</small>
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="3" placeholder="A short description for SEO (max 160 characters).">{{ old('meta_description', $template->meta_description) }}</textarea>
                        </div>
                         <div class="mb-3">
                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" placeholder="keyword1, keyword2, keyword3" value="{{ old('meta_keywords', $template->meta_keywords) }}">
                             <small class="form-text text-muted">Comma-separated keywords.</small>
                        </div>
                        <hr>
                        <h6 class="text-muted">Social Media Preview (Open Graph)</h6>
                         <div class="mb-3">
                            <label for="og_title" class="form-label">Social Media Title</label>
                            <input type="text" name="og_title" class="form-control" id="og_title" placeholder="Title shown when sharing on social media" value="{{ old('og_title', $template->og_title) }}">
                            <small class="form-text text-muted">If empty, the Meta Title will be used.</small>
                        </div>
                         <div class="mb-3">
                            <label for="og_description" class="form-label">Social Media Description</label>
                            <textarea class="form-control" name="og_description" id="og_description" rows="3" placeholder="Description shown when sharing on social media">{{ old('og_description', $template->og_description) }}</textarea>
                             <small class="form-text text-muted">If empty, the Meta Description will be used.</small>
                        </div>
                         <div class="mb-3">
                            <label for="og_image" class="form-label">Social Media Image</label>
                            <input class="form-control" type="file" id="og_image" name="og_image">
                            <small class="form-text text-muted">Leave blank to keep the current image. Recommended: 1200x630px.</small>
                            @if($template->og_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $template->og_image) }}" alt="OG Image" class="img-thumbnail" width="150">
                                </div>
                            @endif
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
                                <option value="pernikahan" @selected(old('category', $template->category) == 'pernikahan')>Pernikahan</option>
                                <option value="ulang_tahun" @selected(old('category', $template->category) == 'ulang_tahun')>Ulang Tahun</option>
                                <option value="pertunangan" @selected(old('category', $template->category) == 'pertunangan')>Pertunangan</option>
                                <option value="wisuda" @selected(old('category', $template->category) == 'wisuda')>Wisuda</option>
                                <option value="lainnya" @selected(old('category', $template->category) == 'lainnya')>Lainnya</option>
                            </select>
                        </div>
                         <div class="mb-3">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price" class="form-control" id="price" placeholder="100000" step="1000" value="{{ old('price', $template->price) }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="badge" class="form-label">Badge</label>
                            <input type="text" name="badge" class="form-control" id="badge" placeholder="e.g., New, Popular" value="{{ old('badge', $template->badge) }}">
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
                            <input type="url" name="preview_url" class="form-control" id="preview_url" placeholder="https://example.com/preview" value="{{ old('preview_url', $template->preview_url) }}">
                        </div>
                        <div class="mb-3">
                            <label for="demo_url" class="form-label">Live Demo URL</label>
                            <input type="url" name="demo_url" class="form-control" id="demo_url" placeholder="https://example.com/demo" value="{{ old('demo_url', $template->demo_url) }}">
                        </div>
                         <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                            <small class="form-text text-muted">Leave blank to keep the current thumbnail.</small>
                            @if($template->thumbnail)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $template->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="150">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-check-circle-fill me-2"></i>Update Template
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
