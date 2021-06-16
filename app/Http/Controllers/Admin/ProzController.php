<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;

class ProzController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function language()
    {
        return view('admin.dashboard',)->with('languages', Language::all());
    }
}
