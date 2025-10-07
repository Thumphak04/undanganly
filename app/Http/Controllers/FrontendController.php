<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the templates on the frontend.
     */
    public function index()
    {
        $templates = Template::latest()->get();
        return view('app.pages.index', compact('templates'));
    }
        public function show(Template $template)
    {
        // Ambil template lain yang sejenis (berdasarkan kategori yang sama)
        // untuk ditampilkan di bagian "Template Serupa".
        $relatedTemplates = Template::where('category', $template->category)
                                      ->where('id', '!=', $template->id) // Jangan tampilkan template yang sedang dilihat
                                      ->limit(4) // Batasi hanya 4 template
                                      ->inRandomOrder() // Tampilkan secara acak agar lebih dinamis
                                      ->get();

        // Kirim data template yang ditemukan dan template terkait ke view
        return view('app.pages.detail', compact('template', 'relatedTemplates'));
    }
       
    public function terms()
    {
        return view('app.pages.terms-condition');
    }

    /**
     * Display the Privacy Policy page.
     */
    public function privacy()
    {
        return view('app.pages.privacy-policy');
    }
}