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
        return view('admin.panel.templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.panel.templates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'detail_templates' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'preview_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'badge' => 'nullable|string|max:50',
        ]);

        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('uploads/templates', 'public');
            $data['thumbnail'] = $path;
        }

        Template::create($data);

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        return view('admin.panel.templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'detail_templates' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'preview_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'badge' => 'nullable|string|max:50',
        ]);

        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if it exists
            if ($template->thumbnail) {
                Storage::disk('public')->delete($template->thumbnail);
            }
            $path = $request->file('thumbnail')->store('uploads/templates', 'public');
            $data['thumbnail'] = $path;
        }

        $template->update($data);

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        // Delete the thumbnail file
        if ($template->thumbnail) {
            Storage::disk('public')->delete($template->thumbnail);
        }
        
        $template->delete();

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template deleted successfully.');
    }
}