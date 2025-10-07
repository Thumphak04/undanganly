<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = Template::latest()->paginate(10);
        // Pastikan path view sudah benar sesuai struktur folder Anda
        return view('admin.panel.templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pastikan path view sudah benar
        return view('admin.panel.templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'detail_templates' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'badge' => 'nullable|string|max:50',
            'preview_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // SEO Fields Validation
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('templates/thumbnails', 'public');
        }

        if ($request->hasFile('og_image')) {
            $validatedData['og_image'] = $request->file('og_image')->store('templates/og_images', 'public');
        }

        Template::create($validatedData);

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        // Pastikan path view sudah benar
        return view('admin.panel.templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'detail_templates' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'badge' => 'nullable|string|max:50',
            'preview_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // SEO Fields Validation
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($template->thumbnail) {
                Storage::disk('public')->delete($template->thumbnail);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('templates/thumbnails', 'public');
        }

        if ($request->hasFile('og_image')) {
            // Hapus og_image lama jika ada
            if ($template->og_image) {
                Storage::disk('public')->delete($template->og_image);
            }
            $validatedData['og_image'] = $request->file('og_image')->store('templates/og_images', 'public');
        }

        $template->update($validatedData);

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        // Hapus file thumbnail dari storage jika ada
        if ($template->thumbnail) {
            Storage::disk('public')->delete($template->thumbnail);
        }

        // Hapus file og_image dari storage jika ada
        if ($template->og_image) {
            Storage::disk('public')->delete($template->og_image);
        }
        
        // Hapus record dari database
        $template->delete();

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template deleted successfully.');
    }
}
