<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Profile;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the dynamic landing page.
     */
    public function index(): View
    {
        $profile = Profile::first();
        $catalogs = Catalog::all();
        $testimonials = Testimonial::all();

        return view('welcome', compact('profile', 'catalogs', 'testimonials'));
    }
}
