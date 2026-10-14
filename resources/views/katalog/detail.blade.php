<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  
  <!-- Dynamic SEO Meta Tags -->
  <title>{{ $catalog->nama_produk }} Medan - Harga OTR, Kredit &amp; Promo 2025 | BYD Arista Cemara</title>
  <meta name="description" content="Dapatkan harga OTR Medan {{ $catalog->nama_produk }} mulai {{ $catalog->formatted_harga }}. Garansi Blade Battery 8 tahun, promo bunga 0%, dan unit test drive gratis di BYD Arista Cemara Medan."/>
  <meta name="keywords" content="{{ $catalog->nama_produk }} Medan, harga {{ $catalog->nama_produk }} Medan, simulasi kredit {{ $catalog->nama_produk }}, dealer BYD Medan, promo BYD Medan 2025"/>
  <meta name="author" content="{{ $profile->nama_sales ?? 'Keldy Sietra' }} - BYD Arista Cemara Medan"/>
  <meta name="robots" content="index, follow"/>
  <link rel="canonical" href="{{ route('katalog.detail', $catalog->slug) }}"/>

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="product"/>
  <meta property="og:site_name" content="BYD Arista Cemara Medan"/>
  <meta property="og:title" content="{{ $catalog->nama_produk }} Medan - Promo OTR 2025"/>
  <meta property="og:description" content="Harga OTR Medan {{ $catalog->nama_produk }} {{ $catalog->formatted_harga }}. Konsultasikan kredit DP ringan dan jadwalkan test drive resmi sekarang."/>
  <meta property="og:image" content="{{ $catalog->first_photo_url }}"/>
  <meta property="og:url" content="{{ route('katalog.detail', $catalog->slug) }}"/>

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="{{ $catalog->nama_produk }} Medan - Promo OTR 2025"/>
  <meta name="twitter:description" content="Dapatkan penawaran terbaik mobil listrik {{ $catalog->nama_produk }} di BYD Arista Cemara Medan."/>
  <meta name="twitter:image" content="{{ $catalog->first_photo_url }}"/>

  <!-- Schema.org JSON-LD Structured Data for Product & Dealer -->
  @php
    $catalogSchema = [
      '@context' => 'https://schema.org/',
      '@type' => 'Product',
      'name' => $catalog->nama_produk,
      'image' => $catalog->photo_urls,
      'description' => \Illuminate\Support\Str::limit(strip_tags($catalog->keterangan), 250),
      'brand' => [
        '@type' => 'Brand',
        'name' => 'BYD',
      ],
      'offers' => [
        '@type' => 'Offer',
        'url' => route('katalog.detail', $catalog->slug),
        'priceCurrency' => 'IDR',
        'price' => (string) $catalog->harga,
        'priceValidUntil' => '2026-12-31',
        'itemCondition' => 'https://schema.org/NewCondition',
        'availability' => 'https://schema.org/InStock',
        'seller' => [
          '@type' => 'AutoDealer',
          'name' => $profile->nama_produk ?? 'BYD Arista Cemara Medan',
          'telephone' => $profile->nomor_telepon ?? '082368827959',
          'address' => $profile->alamat ?? 'Jl. Cemara No. 198, Medan',
        ],
      ],
    ];
  @endphp
  <script type="application/ld+json">
  {!! json_encode($catalogSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary-container": "#1e5baa",
            "primary": "#004389",
            "ev-cyan": "#00E5FF",
            "whatsapp-green": "#25D366",
            "surface-dark": "#0B131F",
            "surface": "#f8f9ff",
            "surface-card": "#FFFFFF",
            "surface-muted": "#F4F7FA",
            "border-subtle": "#E2E8F0",
            "on-surface": "#0b1c30",
            "on-surface-variant": "#424751",
          },
          fontFamily: {
            "heading": ["Space Grotesk", "sans-serif"],
            "body": ["Hanken Grotesk", "sans-serif"]
          }
        }
      }
    };
  </script>

  <style>
    /* Custom Scrollbar */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #0B131F; }
    ::-webkit-scrollbar-thumb { background: #1e5baa; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #00E5FF; }
  </style>
</head>
<body class="bg-[#F8F9FF] font-body text-on-surface antialiased selection:bg-primary selection:text-white">

  <!-- TOP HEADER -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-surface-dark/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.25)] border-b border-white/10">
    <div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between gap-6">
      
      <!-- Logo -->
      <a href="{{ route('home') }}" class="flex items-center gap-4 shrink-0 group">
        <img alt="BYD Medan Logo" class="h-8 w-auto object-contain transition-transform group-hover:scale-105" src="{{ asset('images/byd_auto_logo.png') }}"/>
        <div class="flex flex-col">
          <span class="font-heading text-sm font-bold text-white tracking-wider uppercase leading-tight group-hover:text-ev-cyan transition-colors">BYD Arista</span>
          <span class="text-[10px] text-ev-cyan uppercase tracking-widest leading-none">Cemara Medan</span>
        </div>
      </a>

      <!-- Navigation Links -->
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium text-white/80">
        <a href="{{ route('home') }}#beranda" class="hover:text-white transition-colors">Beranda</a>
        <a href="{{ route('home') }}#katalog-model" class="text-ev-cyan font-semibold transition-colors">Katalog Model</a>
        <a href="{{ route('home') }}#pricelist" class="hover:text-white transition-colors">Pricelist</a>
        <a href="{{ route('home') }}#simulasi-kredit" class="hover:text-white transition-colors">Simulasi Kredit</a>
        <a href="{{ route('home') }}#testimonial" class="hover:text-white transition-colors">Testimonial</a>
        <a href="{{ route('home') }}#lokasi" class="hover:text-white transition-colors">Lokasi</a>
      </nav>

      <!-- Actions -->
      <div class="flex items-center gap-3">
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->nomor_telepon ?? '082368827959') }}?text=Halo%20{{ urlencode($profile->nama_sales ?? 'Keldy Sietra') }},%20saya%20tertarik%20dengan%20unit%20{{ urlencode($catalog->nama_produk) }}%20di%20BYD%20Medan" target="_blank"
           class="inline-flex items-center gap-2 bg-whatsapp-green hover:brightness-110 text-white px-4 py-2.5 rounded-xl font-semibold text-xs shadow-md shadow-whatsapp-green/20 transition-all transform hover:-translate-y-0.5">
          <span class="material-symbols-outlined text-[18px]">chat</span>
          <span>Tanya Sales WA</span>
        </a>
      </div>
    </div>
  </header>

  <!-- MAIN DETAIL WRAPPER -->
  <main class="w-full pt-28 pb-20 max-w-7xl mx-auto px-6 lg:px-12">
    
    <!-- Breadcrumbs -->
    <div class="mb-6 flex items-center gap-2 text-xs text-on-surface-variant">
      <a href="{{ route('home') }}" class="hover:text-primary transition-colors flex items-center gap-1">
        <span class="material-symbols-outlined text-[16px]">home</span>
        <span>Beranda</span>
      </a>
      <span>/</span>
      <a href="{{ route('home') }}#katalog-model" class="hover:text-primary transition-colors">Katalog Model EV</a>
      <span>/</span>
      <span class="text-primary font-bold">{{ $catalog->nama_produk }}</span>
    </div>

    <!-- Product Hero Grid: Gallery (Left) & Detail Info (Right) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
      
      <!-- LEFT: 3-PHOTO INTERACTIVE GALLERY (7 COLS) -->
      <div class="lg:col-span-7 space-y-4">
        
        <!-- Main Viewport Image -->
        <div class="relative w-full aspect-[16/10] rounded-3xl overflow-hidden bg-surface-dark shadow-xl border border-border-subtle group">
          <img id="mainGalleryImage" src="{{ $catalog->first_photo_url }}" alt="{{ $catalog->nama_produk }}" class="w-full h-full object-cover transition-all duration-300 group-hover:scale-105"/>
          
          <!-- Badges -->
          <div class="absolute top-4 left-4 flex items-center gap-2">
            <span class="px-3.5 py-1.5 rounded-full bg-primary-container text-white text-xs font-bold shadow-md">
              EV Resmi 2025
            </span>
            <span class="px-3.5 py-1.5 rounded-full bg-surface-dark/85 backdrop-blur-md text-ev-cyan text-xs font-semibold border border-ev-cyan/30">
              Blade Battery
            </span>
          </div>

          <div class="absolute bottom-4 right-4 px-3 py-1 rounded-xl bg-surface-dark/80 backdrop-blur-md text-white text-xs font-semibold">
            BYD Arista Cemara Medan
          </div>
        </div>

        <!-- Thumbnails Strip (Up to 3 Photos) -->
        @if (count($catalog->photo_urls) > 1)
          <div class="flex items-center gap-3">
            @foreach ($catalog->photo_urls as $idx => $photo)
              <button type="button" onclick="changeMainGalleryPhoto('{{ $photo }}', this)"
                      class="gallery-thumb relative w-24 aspect-[4/3] rounded-2xl overflow-hidden border-2 {{ $loop->first ? 'border-ev-cyan ring-2 ring-ev-cyan/40 scale-105' : 'border-border-subtle opacity-70 hover:opacity-100' }} transition-all focus:outline-none">
                <img src="{{ $photo }}" alt="Thumbnail {{ $idx + 1 }}" class="w-full h-full object-cover"/>
                <span class="absolute bottom-1 right-1 text-[9px] bg-black/70 text-white px-1 rounded font-bold">Foto {{ $idx + 1 }}</span>
              </button>
            @endforeach
          </div>
        @endif

        <!-- Warranty & Package Guarantee Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4">
          <div class="p-3.5 rounded-2xl bg-white border border-border-subtle shadow-sm flex flex-col gap-1">
            <span class="material-symbols-outlined text-ev-cyan text-[24px]">verified_user</span>
            <span class="text-xs font-bold text-on-surface">Garansi 8 Thn</span>
            <span class="text-[11px] text-on-surface-variant">Blade Battery 160.000 KM</span>
          </div>

          <div class="p-3.5 rounded-2xl bg-white border border-border-subtle shadow-sm flex flex-col gap-1">
            <span class="material-symbols-outlined text-primary text-[24px]">ev_charger</span>
            <span class="text-xs font-bold text-on-surface">Free Wallbox</span>
            <span class="text-[11px] text-on-surface-variant">Home Charger 7kW + Pasang</span>
          </div>

          <div class="p-3.5 rounded-2xl bg-white border border-border-subtle shadow-sm flex flex-col gap-1">
            <span class="material-symbols-outlined text-whatsapp-green text-[24px]">build_circle</span>
            <span class="text-xs font-bold text-on-surface">Free Servis 4 Thn</span>
            <span class="text-[11px] text-on-surface-variant">Jasa &amp; Spare Part 60.000 KM</span>
          </div>

          <div class="p-3.5 rounded-2xl bg-white border border-border-subtle shadow-sm flex flex-col gap-1">
            <span class="material-symbols-outlined text-purple-600 text-[24px]">card_giftcard</span>
            <span class="text-xs font-bold text-on-surface">Bonus Ekstra</span>
            <span class="text-[11px] text-on-surface-variant">Kaca Film &amp; Karpet Set</span>
          </div>
        </div>

      </div>

      <!-- RIGHT: PRODUCT SPECIFICATIONS & ACTIONS (5 COLS) -->
      <div class="lg:col-span-5 space-y-6">
        
        <div class="bg-white rounded-3xl border border-border-subtle shadow-md p-6 lg:p-8 space-y-6">
          
          <!-- Title & Price Block -->
          <div class="space-y-2 pb-6 border-b border-border-subtle">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold">
              <span class="w-2 h-2 rounded-full bg-primary"></span>
              <span>Unit Resmi ATPM Sumatera Utara</span>
            </div>
            
            <h1 class="text-2xl lg:text-3xl font-bold font-heading text-on-surface tracking-tight">
              {{ $catalog->nama_produk }}
            </h1>

            <div class="pt-2">
              <span class="text-xs text-on-surface-variant block">Harga On The Road (OTR) Medan:</span>
              <div class="text-3xl font-bold font-heading text-primary mt-1">
                {{ $catalog->formatted_harga }}
              </div>
              <span class="text-[11px] text-on-surface-variant italic mt-1 block">
                *Termasuk subsidi PPN, plat BK resmi, dan garansi penuh dealer.
              </span>
            </div>
          </div>

          <!-- Description Block -->
          <div class="space-y-2">
            <h3 class="text-sm font-bold text-on-surface uppercase tracking-wider">Keterangan &amp; Fitur Unggulan</h3>
            <p class="text-sm text-on-surface-variant leading-relaxed whitespace-pre-line">
              {{ $catalog->keterangan }}
            </p>
          </div>

          <!-- CTAs -->
          <div class="space-y-3 pt-4 border-t border-border-subtle">
            <!-- WA CTA -->
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->nomor_telepon ?? '082368827959') }}?text=Halo%20{{ urlencode($profile->nama_sales ?? 'Keldy Sietra') }},%20saya%20ingin%20tanya%20detail%20promo%20dan%20diskon%20unit%20{{ urlencode($catalog->nama_produk) }}%20OTR%20Medan%20({{ urlencode($catalog->formatted_harga) }})." target="_blank"
               class="w-full py-3.5 px-4 rounded-2xl bg-whatsapp-green hover:brightness-105 text-white font-bold text-sm shadow-lg shadow-whatsapp-green/25 transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5">
              <span class="material-symbols-outlined text-[20px]">chat</span>
              <span>Hubungi Sales via WhatsApp</span>
            </a>

            <!-- Credit Calculator CTA -->
            <a href="{{ route('home') }}#simulasi-kredit" 
               class="w-full py-3.5 px-4 rounded-2xl bg-primary-container hover:bg-primary text-white font-bold text-sm shadow-md transition-all flex items-center justify-center gap-2">
              <span class="material-symbols-outlined text-[20px]">calculate</span>
              <span>Hitung Simulasi Angsuran Kredit</span>
            </a>

            <!-- Test Drive Booking CTA -->
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->nomor_telepon ?? '082368827959') }}?text=Halo%20{{ urlencode($profile->nama_sales ?? 'Keldy Sietra') }},%20saya%20ingin%20booking%20jadwal%20Test%20Drive%20unit%20{{ urlencode($catalog->nama_produk) }}%20ke%20lokasi%20saya%20di%20Medan." target="_blank"
               class="w-full py-3 px-4 rounded-2xl bg-surface-muted hover:bg-kt-gray-200 text-on-surface font-semibold text-xs transition-colors flex items-center justify-center gap-2 border border-border-subtle">
              <span class="material-symbols-outlined text-[18px]">key</span>
              <span>Jadwalkan Test Drive Gratis ke Rumah</span>
            </a>
          </div>

          <!-- Sales Supervisor Card -->
          <div class="p-4 rounded-2xl bg-surface-muted border border-border-subtle flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary/20 text-primary flex items-center justify-center font-bold text-lg shrink-0">
              <span class="material-symbols-outlined text-[26px]">support_agent</span>
            </div>
            <div class="min-w-0 flex-1 text-xs">
              <div class="font-bold text-on-surface text-sm truncate">{{ $profile->nama_sales ?? 'Keldy Sietra' }}</div>
              <div class="text-on-surface-variant truncate">{{ $profile->jabatan_sales ?? 'Sales Supervisor BYD Medan' }}</div>
              <div class="text-whatsapp-green font-semibold mt-0.5">{{ $profile->nomor_telepon ?? '082368827959' }}</div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- RECOMMENDED OTHER MODELS -->
    @if ($relatedCatalogs->count() > 0)
      <div class="mt-20 space-y-6">
        <div class="flex items-center justify-between pb-3 border-b border-border-subtle">
          <div>
            <h2 class="text-xl font-bold font-heading text-on-surface">Pilihan Model BYD Lainnya</h2>
            <p class="text-xs text-on-surface-variant">Jelajahi lini mobil listrik resmi BYD lainnya di Kota Medan.</p>
          </div>
          <a href="{{ route('home') }}#katalog-model" class="text-xs font-bold text-primary hover:underline">
            Lihat Semua Katalog &rarr;
          </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          @foreach ($relatedCatalogs as $item)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-border-subtle flex flex-col group">
              <div class="relative w-full aspect-[16/10] overflow-hidden bg-surface-dark">
                <img src="{{ $item->first_photo_url }}" alt="{{ $item->nama_produk }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
              </div>
              <div class="p-5 flex flex-col flex-1 justify-between gap-3">
                <div>
                  <h3 class="font-bold font-heading text-on-surface text-base group-hover:text-primary transition-colors">
                    {{ $item->nama_produk }}
                  </h3>
                  <div class="text-primary font-bold text-sm mt-1">
                    {{ $item->formatted_harga }}
                  </div>
                  <p class="text-xs text-on-surface-variant line-clamp-2 mt-2">
                    {{ $item->keterangan }}
                  </p>
                </div>
                <div class="pt-3 border-t border-border-subtle flex items-center justify-between">
                  <a href="{{ route('katalog.detail', $item->slug) }}" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                    <span>Lihat Detail</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                  </a>
                  <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->nomor_telepon ?? '082368827959') }}?text=Halo%20Keldy,%20saya%20ingin%20tanya%20detail%20unit%20{{ urlencode($item->nama_produk) }}" target="_blank" class="p-2 rounded-xl text-whatsapp-green hover:bg-green-50 transition-colors" title="Chat WhatsApp">
                    <span class="material-symbols-outlined text-[20px]">chat</span>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

  </main>

  <!-- FOOTER -->
  <footer class="w-full bg-surface-dark text-white border-t border-white/10 mt-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-white/60">
      <div class="flex items-center gap-3">
        <img alt="BYD Logo" class="h-6 w-auto" src="{{ asset('images/byd_auto_logo.png') }}"/>
        <span>&copy; 2025 {{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}. Hak Cipta Dilindungi.</span>
      </div>
      <div class="flex items-center gap-4">
        <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
        <span>&bull;</span>
        <a href="{{ route('sitemap') }}" target="_blank" class="hover:text-white transition-colors">Sitemap XML</a>
        <span>&bull;</span>
        <a href="{{ route('login') }}" class="hover:text-white transition-colors">Admin Login</a>
      </div>
    </div>
  </footer>

  <!-- SCRIPT FOR THUMBNAIL GALLERY SWAPPING -->
  <script>
    function changeMainGalleryPhoto(newSrc, thumbBtn) {
      const mainImg = document.getElementById('mainGalleryImage');
      mainImg.style.opacity = '0.3';
      setTimeout(() => {
        mainImg.src = newSrc;
        mainImg.style.opacity = '1';
      }, 150);

      // Reset thumbs
      document.querySelectorAll('.gallery-thumb').forEach(btn => {
        btn.className = 'gallery-thumb relative w-24 aspect-[4/3] rounded-2xl overflow-hidden border-2 border-border-subtle opacity-70 hover:opacity-100 transition-all focus:outline-none';
      });

      // Highlight active
      thumbBtn.className = 'gallery-thumb relative w-24 aspect-[4/3] rounded-2xl overflow-hidden border-2 border-ev-cyan ring-2 ring-ev-cyan/40 scale-105 transition-all focus:outline-none';
    }
  </script>
</body>
</html>
