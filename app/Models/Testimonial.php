<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'uuid',
        'nama_pelanggan',
        'keterangan',
        'foto',
    ];

    /**
     * Boot the model to auto-generate UUID.
     */
    protected static function booted(): void
    {
        static::creating(function (Testimonial $testimonial): void {
            if (empty($testimonial->uuid)) {
                $testimonial->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the photo URL.
     */
    public function getPhotoUrlAttribute(): string
    {
        if (! empty($this->foto)) {
            if (Str::startsWith($this->foto, ['http://', 'https://', '/'])) {
                return $this->foto;
            }

            return asset('storage/'.$this->foto);
        }

        return '/images/customer_handover_seal.png';
    }
}
