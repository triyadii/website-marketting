<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Catalog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'uuid',
        'nama_produk',
        'slug',
        'harga',
        'keterangan',
        'foto',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'harga' => 'integer',
            'foto' => 'array',
        ];
    }

    /**
     * Boot the model to auto-generate UUID and Slug.
     */
    protected static function booted(): void
    {
        static::creating(function (Catalog $catalog): void {
            if (empty($catalog->uuid)) {
                $catalog->uuid = (string) Str::uuid();
            }
            if (empty($catalog->slug)) {
                $baseSlug = Str::slug($catalog->nama_produk);
                $slug = $baseSlug;
                $counter = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = "{$baseSlug}-{$counter}";
                    $counter++;
                }
                $catalog->slug = $slug;
            }
        });
    }

    /**
     * Get formatted Indonesian Rupiah price.
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp '.number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get the first photo URL or a placeholder.
     */
    public function getFirstPhotoUrlAttribute(): string
    {
        $photos = $this->photo_urls;

        return $photos[0] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuC46bY82dOMqVfEsD2IHDOAsJv9jeJsy2-Vd05KSRIZGo_EARbXsVejSW1yk4h5ivx-Nk_O9XwWfEwlsOOBcO1iSg-GdtYScXN_Wbcn0nGhbZtXzX3H7lWjrIOmwlRhYSlC5soP6kWEYbx77ON4X1zvFmjBVKFtC65ZRLdJUuch1Ei54ZCj5ieP7On-0nt4tUk2FW7U7X12PGtc50JqwnJV_vlFkBAcYazdPh7E9XMVjmgkXSoXwKNg9w';
    }

    /**
     * Get all resolved photo URLs (up to 3).
     *
     * @return array<int, string>
     */
    public function getPhotoUrlsAttribute(): array
    {
        if (empty($this->foto) || ! is_array($this->foto)) {
            return [];
        }

        return array_map(function ($item): string {
            if (Str::startsWith($item, ['http://', 'https://', '/'])) {
                return $item;
            }

            return asset('storage/'.$item);
        }, array_slice($this->foto, 0, 3));
    }
}
