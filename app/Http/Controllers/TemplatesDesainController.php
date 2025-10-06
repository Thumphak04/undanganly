<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplatesDesainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function golden_harmony()
    {
        return view('templates.golden-harmony.index');
    }
       public function golden()
    {
        return view('templates.golden-harmony.index');
    }
       public function crimsom()
    {
        return view('templates.crimsom-bloom.index');
    }
}
