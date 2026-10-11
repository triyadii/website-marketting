<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Profile;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Metronic-themed admin dashboard.
     */
    public function index(): View
    {
        $totalCatalogs = Catalog::count();
        $totalTestimonials = Testimonial::count();
        $totalUsers = User::count();
        $profile = Profile::first();

        $recentCatalogs = Catalog::latest()->take(5)->get();
        $recentTestimonials = Testimonial::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalCatalogs',
            'totalTestimonials',
            'totalUsers',
            'profile',
            'recentCatalogs',
            'recentTestimonials'
        ));
    }
}
