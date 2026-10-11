<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap for SEO.
     */
    public function index(): Response
    {
        $catalogs = Catalog::all();
        $baseUrl = url('/');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars($baseUrl).'</loc>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';

        // Catalog Details
        foreach ($catalogs as $item) {
            $xml .= '<url>';
            $xml .= '<loc>'.htmlspecialchars(route('katalog.detail', $item->slug)).'</loc>';
            $xml .= '<lastmod>'.$item->updated_at->toAtomString().'</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    /**
     * Generate robots.txt response.
     */
    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /login\n\n";
        $content .= 'Sitemap: '.url('/sitemap.xml')."\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
