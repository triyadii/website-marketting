<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
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
        'nomor_telepon',
        'foto_hero_section',
        'keterangan_profil',
        'nama_sales',
        'jabatan_sales',
        'jam_operasional',
        'alamat',
        'maps_iframe',
        'ig',
        'tiktok',
        'treads',
    ];

    /**
     * Boot the model to auto-generate UUID.
     */
    protected static function booted(): void
    {
        static::creating(function (Profile $profile): void {
            if (empty($profile->uuid)) {
                $profile->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the hero photo URL.
     */
    public function getHeroPhotoUrlAttribute(): string
    {
        if (! empty($this->foto_hero_section)) {
            if (Str::startsWith($this->foto_hero_section, ['http://', 'https://', '/'])) {
                return $this->foto_hero_section;
            }

            return asset('storage/'.$this->foto_hero_section);
        }

        return 'https://lh3.googleusercontent.com/aida-public/AB6AXuAS1f4ZtXUi7wcrXCfI0Umkzvf3pLcxgOVkHer7YBi9Q25GuezhFbnCo4aS87QNJGY5uqvxHKKEXo-cnuJCjgjaZNx0B1bJ5axPFfj7_2mj9MNSN8IPBUiyqtGWCBuJY6f4wSuHvJ1at1DexE7m1M9L2Hdk2IPPi--Dt-UuT3iP9ZVp9e8WZetF1tVOI6pJ23dlyl9kXBKHUhpBpSf3POOZpfbDoI2qTzWvR_Qtlg05h85fT_P4GgVpzQ';
    }

    /**
     * Get clean numeric WhatsApp number formatted with country code (62...).
     */
    public function getWhatsappNumberAttribute(): string
    {
        $phone = preg_replace('/[^0-9]/', '', $this->nomor_telepon ?? '082368827959');
        if (Str::startsWith($phone, '0')) {
            return '62'.substr($phone, 1);
        }

        return $phone ?: '6282368827959';
    }

    /**
     * Get formatted Google Maps embed code or iframe.
     */
    public function getMapsEmbedHtmlAttribute(): string
    {
        if (! empty($this->maps_iframe)) {
            $raw = trim($this->maps_iframe);
            // If user inputted full <iframe ...> tag
            if (Str::contains($raw, '<iframe')) {
                // Ensure width and height fill the container
                $iframe = preg_replace('/width=["\'][^"\']*["\']/', 'width="100%"', $raw);
                $iframe = preg_replace('/height=["\'][^"\']*["\']/', 'height="100%"', $iframe);
                if (! Str::contains($iframe, 'class=')) {
                    $iframe = str_replace('<iframe', '<iframe class="w-full h-full min-h-[380px] border-0 rounded-2xl"', $iframe);
                } else {
                    $iframe = preg_replace('/class=["\'][^"\']*["\']/', 'class="w-full h-full min-h-[380px] border-0 rounded-2xl"', $iframe);
                }

                return $iframe;
            }

            // If user provided direct URL
            $url = htmlspecialchars($raw, ENT_QUOTES, 'UTF-8');

            return '<iframe src="'.$url.'" class="w-full h-full min-h-[380px] border-0 rounded-2xl" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>';
        }

        // Official default Google Maps embed for BYD Arista Cemara Medan
        $defaultEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8797966442654!2d98.6791636!3d3.6149495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313164906fcce1%3A0x6b97036a19f939e6!2sBYD%20ARISTA%20MEDAN%20CEMARA!5e0!3m2!1sid!2sid!4v1716300000000!5m2!1sid!2sid';

        return '<iframe src="'.$defaultEmbed.'" class="w-full h-full min-h-[380px] border-0 rounded-2xl" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>';
    }
}
