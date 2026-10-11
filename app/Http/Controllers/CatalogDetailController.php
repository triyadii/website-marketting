<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CatalogDetailController extends Controller
{
    /**
     * Display the specified product detail page for users.
     */
    public function show(string $slug): View
    {
        $catalog = Str::isUuid($slug)
            ? Catalog::where('uuid', $slug)->firstOrFail()
            : Catalog::where('slug', $slug)->firstOrFail();

        $profile = Profile::first();
        $relatedCatalogs = Catalog::where('id', '!=', $catalog->id)->take(3)->get();

        return view('katalog.detail', compact('catalog', 'profile', 'relatedCatalogs'));
    }
}
