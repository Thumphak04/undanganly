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