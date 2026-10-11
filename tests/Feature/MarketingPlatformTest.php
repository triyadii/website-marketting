<?php

namespace Tests\Feature;

use App\Models\Catalog;
use App\Models\Profile;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class MarketingPlatformTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Profile::create([
            'nama_produk' => 'BYD Arista Cemara Medan',
            'nomor_telepon' => '082368827959',
            'keterangan_profil' => 'Dealer resmi mobil listrik BYD di Kota Medan.',
            'nama_sales' => 'Keldy Sietra',
            'jabatan_sales' => 'Sales Supervisor',
            'jam_operasional' => 'Senin - Minggu: 08.30 - 18.00 WIB',
            'alamat' => 'Jl. Cemara No. 198, Medan',
            'ig' => '@bydmedan.official',
            'tiktok' => '@bydmedan',
            'treads' => '@bydmedan',
        ]);
    }

    public function test_landing_page_can_be_rendered(): void
    {
        Catalog::create([
            'nama_produk' => 'BYD Seal',
            'harga' => 660500000,
            'keterangan' => 'Sedan listrik mewah',
            'foto' => ['https://images.unsplash.com/photo-1'],
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('BYD Arista Cemara Medan');
        $response->assertSee('Keldy Sietra');
    }

    public function test_catalog_detail_page_can_be_rendered(): void
    {
        $catalog = Catalog::create([
            'nama_produk' => 'BYD Seal',
            'harga' => 660500000,
            'keterangan' => 'Sedan listrik mewah performa tinggi.',
            'foto' => [
                'https://images.unsplash.com/photo-1',
                'https://images.unsplash.com/photo-2',
            ],
        ]);

        $response = $this->get('/katalog/'.$catalog->slug);
        $response->assertStatus(200);
        $response->assertSee('BYD Seal');
        $response->assertSee('Rp 660.500.000');
    }

    public function test_seo_sitemap_and_robots_are_accessible(): void
    {
        $sitemapRes = $this->get('/sitemap.xml');
        $sitemapRes->assertStatus(200);
        $sitemapRes->assertHeader('Content-Type', 'application/xml');

        $robotsRes = $this->get('/robots.txt');
        $robotsRes->assertStatus(200);
        $robotsRes->assertSee('User-agent: *');
        $robotsRes->assertSee('Disallow: /admin');
    }

    public function test_admin_can_login_with_username_and_password(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_admin_profile_singleton_can_be_updated(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($admin)->put('/admin/profile', [
            'nama_produk' => 'BYD Medan Updated',
            'nomor_telepon' => '081234567890',
            'keterangan_profil' => 'Keterangan diperbarui',
            'nama_sales' => 'Budi Sales',
            'jabatan_sales' => 'Senior Consultant',
            'jam_operasional' => '09:00 - 17:00 WIB',
            'alamat' => 'Jl. Gatot Subroto Medan',
            'maps_iframe' => '<iframe src="https://maps.google.com/embed"></iframe>',
            'ig' => '@byd_medan_new',
            'tiktok' => '@bydtiktok',
            'treads' => '@bydthreads',
        ]);

        $response->assertRedirect('/admin/profile');
        $this->assertDatabaseHas('profiles', [
            'nama_produk' => 'BYD Medan Updated',
            'nama_sales' => 'Budi Sales',
            'maps_iframe' => '<iframe src="https://maps.google.com/embed"></iframe>',
        ]);
        // Confirm only 1 profile exists (singleton rule)
        $this->assertEquals(1, Profile::count());
    }

    public function test_admin_can_manage_accounts(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        // Create account
        $createRes = $this->actingAs($admin)->post('/admin/accounts', [
            'username' => 'salesuser',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);
        $createRes->assertRedirect('/admin/accounts');

        $newUser = User::where('username', 'salesuser')->first();
        $this->assertNotNull($newUser);
        $this->assertNotEmpty($newUser->uuid);

        // Update account
        $updateRes = $this->actingAs($admin)->put('/admin/accounts/'.$newUser->uuid, [
            'username' => 'salesuser_updated',
        ]);
        $updateRes->assertRedirect('/admin/accounts');
        $this->assertDatabaseHas('users', ['username' => 'salesuser_updated']);

        // Delete account
        $deleteRes = $this->actingAs($admin)->delete('/admin/accounts/'.$newUser->uuid);
        $deleteRes->assertRedirect('/admin/accounts');
        $this->assertDatabaseMissing('users', ['username' => 'salesuser_updated']);
    }

    public function test_admin_can_manage_catalogs_and_enforce_max_3_photos(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        // Create catalog
        $createRes = $this->actingAs($admin)->post('/admin/catalogs', [
            'nama_produk' => 'BYD Atto 3 EV',
            'harga' => 525000000,
            'keterangan' => 'SUV Listrik Modern Tangguh',
            'foto_urls' => [
                'https://example.com/img1.jpg',
                'https://example.com/img2.jpg',
            ],
        ]);
        $createRes->assertRedirect('/admin/catalogs');

        $catalog = Catalog::where('nama_produk', 'BYD Atto 3 EV')->first();
        $this->assertNotNull($catalog);
        $this->assertEquals('byd-atto-3-ev', $catalog->slug);

        // Fail when more than 3 photos provided
        $tooManyPhotosRes = $this->actingAs($admin)->post('/admin/catalogs', [
            'nama_produk' => 'BYD Dolphin Test',
            'harga' => 380000000,
            'keterangan' => 'Hatchback',
            'foto_urls' => [
                'https://example.com/1.jpg',
                'https://example.com/2.jpg',
                'https://example.com/3.jpg',
                'https://example.com/4.jpg',
            ],
        ]);
        $tooManyPhotosRes->assertSessionHasErrors('foto_urls');
    }

    public function test_admin_can_manage_testimonials(): void
    {
        $admin = User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $createRes = $this->actingAs($admin)->post('/admin/testimonials', [
            'nama_pelanggan' => 'Dr. Hendra Gunawan',
            'keterangan' => 'Pelayanan ramah, pengiriman cepat.',
            'foto_url' => 'https://example.com/handover.jpg',
        ]);
        $createRes->assertRedirect('/admin/testimonials');

        $testi = Testimonial::where('nama_pelanggan', 'Dr. Hendra Gunawan')->first();
        $this->assertNotNull($testi);
        $this->assertNotEmpty($testi->uuid);
    }
}
