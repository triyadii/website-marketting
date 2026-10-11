<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Profile;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Initial Admin User
        $admin = User::where('username', 'admin')
            ->orWhere('email', 'admin@bydaristamedan.com')
            ->first();

        if (! $admin) {
            User::create([
                'uuid' => (string) Str::uuid(),
                'username' => 'admin',
                'name' => 'Admin BYD Medan',
                'email' => 'admin@bydaristamedan.com',
                'password' => Hash::make('admin123'),
            ]);
        } else {
            $admin->update([
                'username' => 'admin',
                'uuid' => $admin->uuid ?: (string) Str::uuid(),
                'password' => Hash::make('admin123'),
            ]);
        }

        // 2. Initial Profile
        if (Profile::count() === 0) {
            Profile::create([
                'uuid' => (string) Str::uuid(),
                'nama_produk' => 'BYD Arista Cemara Medan',
                'nomor_telepon' => '082368827959',
                'foto_hero_section' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAS1f4ZtXUi7wcrXCfI0Umkzvf3pLcxgOVkHer7YBi9Q25GuezhFbnCo4aS87QNJGY5uqvxHKKEXo-cnuJCjgjaZNx0B1bJ5axPFfj7_2mj9MNSN8IPBUiyqtGWCBuJY6f4wSuHvJ1at1DexE7m1M9L2Hdk2IPPi--Dt-UuT3iP9ZVp9e8WZetF1tVOI6pJ23dlyl9kXBKHUhpBpSf3POOZpfbDoI2qTzWvR_Qtlg05h85fT_P4GgVpzQ',
                'keterangan_profil' => 'Dealer resmi mobil listrik BYD Arista Cemara Medan melayani penjualan, servis berkala, dan suku cadang (3S) terpercaya di seluruh Sumatera Utara. Kami menyediakan konsultasi subsidi PPN, paket DP ringan, bunga 0%, dan test drive gratis diantar ke rumah.',
                'nama_sales' => 'Keldy Sietra',
                'jabatan_sales' => 'Sales Supervisor BYD Medan',
                'jam_operasional' => 'Senin - Minggu: 08.30 - 18.00 WIB (Hari Libur Buka)',
                'alamat' => 'Jl. Cemara No. 198, Pulo Brayan Bengkel Lor, Kec. Medan Timur, Kota Medan, Sumatera Utara 20239',
                'maps_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8797966442654!2d98.6791636!3d3.6149495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313164906fcce1%3A0x6b97036a19f939e6!2sBYD%20ARISTA%20MEDAN%20CEMARA!5e0!3m2!1sid!2sid!4v1716300000000!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'ig' => '@bydaristamedan',
                'tiktok' => '@bydmedan.official',
                'treads' => '@bydaristamedan',
            ]);
        } else {
            $existingProf = Profile::first();
            if ($existingProf && empty($existingProf->maps_iframe)) {
                $existingProf->update([
                    'maps_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8797966442654!2d98.6791636!3d3.6149495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313164906fcce1%3A0x6b97036a19f939e6!2sBYD%20ARISTA%20MEDAN%20CEMARA!5e0!3m2!1sid!2sid!4v1716300000000!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                ]);
            }
        }

        // 3. Initial Catalogs
        if (Catalog::count() === 0) {
            $catalogs = [
                [
                    'nama_produk' => 'BYD Seal',
                    'slug' => 'byd-seal',
                    'harga' => 660500000,
                    'keterangan' => 'Sedan sport listrik premium bertenaga buas dengan akselerasi 0-100 km/jam hanya dalam 3.8 detik. Menggunakan teknologi revolusioner Cell-to-Body (CTB) dan Blade Battery yang kokoh, aerodinamika ocean aesthetics, serta kabin mewah bersuspensi pintar frequency selective damping.',
                    'foto' => [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuC46bY82dOMqVfEsD2IHDOAsJv9jeJsy2-Vd05KSRIZGo_EARbXsVejSW1yk4h5ivx-Nk_O9XwWfEwlsOOBcO1iSg-GdtYScXN_Wbcn0nGhbZtXzX3H7lWjrIOmwlRhYSlC5soP6kWEYbx77ON4X1zvFmjBVKFtC65ZRLdJUuch1Ei54ZCj5ieP7On-0nt4tUk2FW7U7X12PGtc50JqwnJV_vlFkBAcYazdPh7E9XMVjmgkXSoXwKNg9w',
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAS1f4ZtXUi7wcrXCfI0Umkzvf3pLcxgOVkHer7YBi9Q25GuezhFbnCo4aS87QNJGY5uqvxHKKEXo-cnuJCjgjaZNx0B1bJ5axPFfj7_2mj9MNSN8IPBUiyqtGWCBuJY6f4wSuHvJ1at1DexE7m1M9L2Hdk2IPPi--Dt-UuT3iP9ZVp9e8WZetF1tVOI6pJ23dlyl9kXBKHUhpBpSf3POOZpfbDoI2qTzWvR_Qtlg05h85fT_P4GgVpzQ',
                    ],
                ],
                [
                    'nama_produk' => 'BYD Dolphin',
                    'slug' => 'byd-dolphin',
                    'harga' => 371300000,
                    'keterangan' => 'Hatchback cerdas nan lincah yang sangat ideal untuk mobilitas padat di Kota Medan. Dilengkapi kabin lega berkat e-Platform 3.0, sistem infotainment layar putar 12.8 inci, jarak tempuh hingga 490 km, dan efisiensi konsumsi daya listrik terdepan di kelasnya.',
                    'foto' => [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAci-Qa-bgT9dKFp7HXuFFu8pHU16rRKue8gjt8eMnPeo2mc4lO3rwG8dHMvwXMmm91aDtvtH80Vwg8Cl1ZkTot_RPT2AYA2qzUVzzS6kLoRj2LgNE6r3jlzGA4IveZZT9iCZrYKDO6XBtt1BmtX8NPNiODU_Mnj_3xhVeXehQ0VdyjXYxHkgu01ONsfAAyHEMocHvSrW6iQEZVksPdzY4_jX86kDHKLhOiiTrjSsmZmOT1KAMnJ0izcA',
                    ],
                ],
                [
                    'nama_produk' => 'BYD M6',
                    'slug' => 'byd-m6',
                    'harga' => 403000000,
                    'keterangan' => 'MPV listrik murni 7-penumpang pertama di Indonesia. Dirancang khusus untuk kenyamanan maksimal seluruh anggota keluarga dengan kabin senyap, panoramic glass roof, ruang bagasi fleksibel, dan jarak tempuh hingga 530 km untuk perjalanan jarak jauh di Sumatera Utara.',
                    'foto' => [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuC58XQlKzVSrhh6Aaau2cROGJ8Dcuc6eHtLS0eeOqR-qCm_ACDGb45YU-rwuWRaJSpPrr4WVXSFOh0UryNoKpz1M63RKXsg0dB131QOZl05Fn9tmWSf0CSteGghh41FmfVx6KFiDXT7cTY2rjHr5PDmtRSdBmMDujaONSHu6QrRPOD324HkYRhAnKq9gG2M72FhD_HlX0zxCVTMQ_KdipUNT3027a41ic6CzcJvd5WBDzVsyk6FwyJ-4Q',
                    ],
                ],
                [
                    'nama_produk' => 'BYD ATTO 3',
                    'slug' => 'byd-atto-3',
                    'harga' => 405000000,
                    'keterangan' => 'SUV crossover listrik sporty berkarakter tangguh. Memiliki desain interior berkonsep gym futuristik unik, fitur ADAS Level 2 terlengkap, ground clearance fleksibel untuk segala kontur jalan, serta ketahanan Blade Battery bersertifikasi uji tusuk ekstrim.',
                    'foto' => [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAN295Q50TpEC_Rln61X5IzDN-p-eA66LjzGVPNmZbo8faMz52PKP2OI90oC4BQtC3uy2CyvX_0yyCtpPlrP1b0clLZyk7EwCgA4c4NXCuknwjjE6-SOfcXbfVILXdpDqnZFQq8OTqh5DZuItbaMARqzdFhEIS__YvmbPsJbCAEZ7ZBnrTXCEvVLrX8dUWR1FW__K2xrmyygAepOctp8IrNqbRUXCuw3VyVl-NrOqGVNdbQOq__e6kVZw',
                    ],
                ],
                [
                    'nama_produk' => 'BYD ATTO 1',
                    'slug' => 'byd-atto-1',
                    'harga' => 225000000,
                    'keterangan' => 'Mobil listrik komuter perkotaan paling terjangkau, ekonomis, dan praktis. Sangat mudah bermanuver dan parkir di area sempit Kota Medan, biaya pengisian daya super hemat, serta fitur keselamatan standar BYD yang lengkap.',
                    'foto' => [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuBRXd4HP-Kcv__kDLayi7_5Mm92gwPvjeEBsfDrC2b4I09cJJ3y0cRwNexwi8mX_Dq0BS2zVnk7RhJmxU8yZCg-Ogm4Y3OLkLUvSqd3UY3mG3UxeBqq1kCTPyUaVxgUMZ-BghLfFUoK-UyvaiDJU0aKgHfcprRy_vXIR5iOZF8zxGNhcQvaGck2p-Yejz5RZPcx0CsQqWS7Els_9msrzQjxURDF317L6oj1WyVKe9e8bzdSvHjwlWFANA',
                    ],
                ],
                [
                    'nama_produk' => 'BYD Sealion 7',
                    'slug' => 'byd-sealion-7',
                    'harga' => 642500000,
                    'keterangan' => 'Flagship Electric SUV Coupe dengan aura sporty prestisius. Dilengkapi sistem propulsi cerdas motor ganda AWD bertenaga 523 HP, arsitektur 800V ultra-fast charging, audio dynaudio premium 12 speaker, dan sistem asistensi mengemudi tingkat lanjut DiPilot 100.',
                    'foto' => [
                        'https://lh3.googleusercontent.com/aida-public/AB6AXuAyUGn4Am4MSZr655R2oKQc4Z3I1rv_yF998RnC35D1BjnfTGzQ0q1Ea6O29M03OGDbZqo0OCQs4tBLS2j-bpciPtClslAVxB6buyFTODT-Arb4DHHCtlF5602jLgnXVe4JMBad9KVrMjXH1q5tEL2b3-i2-5ChDL6xbVJoKQT7a6-pfFeTZN1RQuYJ8JdCUk7A62uaGUzPHHfLPPsLCTMFaqd7eAYXGn9TbYjEnR0s2if1sJPEuiTsNQ',
                    ],
                ],
            ];

            foreach ($catalogs as $item) {
                Catalog::create([
                    'uuid' => (string) Str::uuid(),
                    'nama_produk' => $item['nama_produk'],
                    'slug' => $item['slug'],
                    'harga' => $item['harga'],
                    'keterangan' => $item['keterangan'],
                    'foto' => $item['foto'],
                ]);
            }
        }

        // 4. Initial Testimonials
        if (Testimonial::count() === 0) {
            $testimonials = [
                [
                    'nama_pelanggan' => 'Bpk. Hendra Wijaya',
                    'keterangan' => 'Pelayanan Pak Keldy luar biasa cepat dan transparan! Dari konsultasi tipe Seal, pengajuan kredit hingga unit plat BK diantar ke rumah hanya butuh waktu singkat. Akselerasi 3.8 detiknya benar-benar buas dan hemat biaya BBM.',
                    'foto' => '/images/customer_handover_seal.png',
                ],
                [
                    'nama_pelanggan' => 'Bpk. Dr. Irwan & Istri',
                    'keterangan' => 'Cari mobil keluarga 7 penumpang yang senyap, lega, dan hemat operasional. BYD M6 adalah pilihan terbaik. Dibantu Pak Keldy dapat diskon spesial dan free wallbox charger langsung dipasang rapi di garasi rumah kami.',
                    'foto' => '/images/customer_handover_m6.png',
                ],
                [
                    'nama_pelanggan' => 'Ibu Jessica Pratama',
                    'keterangan' => 'Sebagai pengguna EV pertama, awalnya ragu soal pengisian daya. Pak Keldy membimbing sangat detail sampai saya paham. Test drive unit diantar langsung ke depan kantor. Handling Atto 3 sangat lincah untuk lalu lintas Medan!',
                    'foto' => '/images/customer_handover_atto3.png',
                ],
            ];

            foreach ($testimonials as $t) {
                Testimonial::create([
                    'uuid' => (string) Str::uuid(),
                    'nama_pelanggan' => $t['nama_pelanggan'],
                    'keterangan' => $t['keterangan'],
                    'foto' => $t['foto'],
                ]);
            }
        }
    }
}
