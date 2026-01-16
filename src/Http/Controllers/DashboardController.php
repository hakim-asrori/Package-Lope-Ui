<?php

namespace HakimAsrori\Lopi\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('lopi::index');
    }

    public function resourceIndex($resourceSlug)
    {
        return view('lopi::resource.index', [
            'slug' => $resourceSlug
        ]);
    }
}
