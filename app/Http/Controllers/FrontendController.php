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
}