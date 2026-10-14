<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="web_standard" name="shell-type"/>
  <title>{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }} - Official Dealer Mobil Listrik BYD</title>
  <meta name="description" content="{{ Str::limit($profile->keterangan_profil ?? 'Dealer Resmi BYD Arista Cemara Medan. Penjualan mobil listrik BYD Seal, Atto 3, Dolphin, M6, Atto 1, Sealion 7. Promo OTR Medan, simulasi kredit bunga ringan, dan unit test drive gratis.', 160) }}"/>
  <meta name="keywords" content="BYD Medan, BYD Arista Cemara, Mobil Listrik Medan, Dealer BYD Medan, Promo BYD Medan, BYD Seal, BYD M6, BYD Atto 3, BYD Dolphin, Simulasi Kredit BYD"/>
  <meta name="author" content="{{ $profile->nama_sales ?? 'BYD Arista Cemara Medan' }}"/>
  <meta name="robots" content="index, follow"/>
  <link rel="canonical" href="{{ url()->current() }}"/>

  <!-- OpenGraph / Facebook -->
  <meta property="og:type" content="website"/>
  <meta property="og:url" content="{{ url()->current() }}"/>
  <meta property="og:title" content="{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }} - Official Dealer Mobil Listrik BYD"/>
  <meta property="og:description" content="{{ Str::limit($profile->keterangan_profil ?? 'Dealer Resmi BYD Arista Cemara Medan. Penjualan mobil listrik BYD Seal, Atto 3, Dolphin, M6, Atto 1, Sealion 7.', 160) }}"/>
  <meta property="og:image" content="{{ $profile->hero_photo_url ?? asset('images/customer_handover_seal.png') }}"/>

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:url" content="{{ url()->current() }}"/>
  <meta name="twitter:title" content="{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}"/>
  <meta name="twitter:description" content="{{ Str::limit($profile->keterangan_profil ?? 'Dealer Resmi BYD Arista Cemara Medan.', 160) }}"/>
  <meta name="twitter:image" content="{{ $profile->hero_photo_url ?? asset('images/customer_handover_seal.png') }}"/>

  <!-- Schema.org AutoDealer & WebSite JSON-LD -->
  @php
    $schemaJson = [
      '@context' => 'https://schema.org',
      '@type' => 'AutoDealer',
      'name' => $profile->nama_produk ?? 'BYD Arista Cemara Medan',
      'description' => $profile->keterangan_profil ?? 'Dealer Resmi Mobil Listrik BYD Medan',
      'image' => $profile->hero_photo_url,
      'url' => url('/'),
      'telephone' => $profile->nomor_telepon ?? '082368827959',
      'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $profile->alamat ?? 'Jl. Cemara No. 198',
        'addressLocality' => 'Medan',
        'addressRegion' => 'Sumatera Utara',
        'postalCode' => '20239',
        'addressCountry' => 'ID',
      ],
      'openingHours' => $profile->jam_operasional ?? 'Mo-Su 08:30-18:00',
      'priceRange' => 'Rp 225.000.000 - Rp 750.000.000',
    ];
  @endphp
  <script type="application/ld+json">
  {!! json_encode($schemaJson, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

  <style>
    html {
      scroll-behavior: smooth;
      scroll-padding-top: 5rem;
    }
    @layer base {
      html, body {
        margin: 0;
        padding: 0;
      }
      body {
        overscroll-behavior: none;
      }
      main > :first-child {
        margin-top: 0 !important;
      }
      main > :last-child {
        margin-bottom: 0 !important;
      }
    }
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      background: #0B131F;
    }
    ::-webkit-scrollbar-thumb {
      background: #1e5baa;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #00E5FF;
    }
    /* Fallback background agar page tidak blank jika Tailwind CDN lambat/gagal */
    body {
      background-color: #f8f9ff;
      color: #0b1c30;
    }
    /* Highlight pulse for focused car cards */
    @keyframes cardFocusPulse {
      0% {
        box-shadow: 0 0 0 0 rgba(0, 229, 255, 0.7);
        transform: scale(1);
      }
      50% {
        box-shadow: 0 0 0 12px rgba(0, 229, 255, 0);
        transform: scale(1.02);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(0, 229, 255, 0);
        transform: scale(1);
      }
    }
    .card-focus-highlight {
      animation: cardFocusPulse 1.4s ease-in-out;
      border-color: #00E5FF !important;
    }
    .text-gradient-ev {
      background: linear-gradient(90deg, #00E5FF 0%, #50d9fe 50%, #ffffff 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>

  <!-- Tailwind CSS CDN Engine MUST load before tailwind.config assignment -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary-container": "#1e5baa",
            "on-secondary-fixed-variant": "#004e5f",
            "inverse-primary": "#aac7ff",
            "background": "#f8f9ff",
            "outline-variant": "#c2c6d3",
            "on-background": "#0b1c30",
            "tertiary-fixed-dim": "#c0c7d1",
            "on-primary-fixed": "#001b3e",
            "outline": "#737783",
            "inverse-surface": "#213145",
            "primary-fixed": "#d6e3ff",
            "secondary-fixed-dim": "#4cd6fb",
            "surface-container-high": "#dce9ff",
            "tertiary-fixed": "#dce3ed",
            "on-tertiary-container": "#cfd6e0",
            "surface-container-highest": "#d3e4fe",
            "inverse-on-surface": "#eaf1ff",
            "surface-card": "#FFFFFF",
            "on-secondary-container": "#005c70",
            "surface-container": "#e5eeff",
            "on-tertiary": "#ffffff",
            "on-primary-fixed-variant": "#00458d",
            "on-surface-variant": "#424751",
            "on-primary": "#ffffff",
            "surface-variant": "#d3e4fe",
            "surface": "#f8f9ff",
            "secondary-fixed": "#b3ebff",
            "tertiary": "#3e454e",
            "primary": "#004389",
            "on-surface": "#0b1c30",
            "surface-muted": "#F4F7FA",
            "on-error-container": "#93000a",
            "border-subtle": "#E2E8F0",
            "error": "#ba1a1a",
            "action-red": "#DB4141",
            "ev-cyan": "#00E5FF",
            "surface-container-lowest": "#ffffff",
            "surface-dark": "#0B131F",
            "on-primary-container": "#c1d5ff",
            "on-secondary-fixed": "#001f27",
            "secondary-container": "#50d9fe",
            "on-error": "#ffffff",
            "surface-container-low": "#eff4ff",
            "surface-bright": "#f8f9ff",
            "on-secondary": "#ffffff",
            "surface-tint": "#225dad",
            "whatsapp-green": "#25D366",
            "on-tertiary-fixed": "#151c24",
            "secondary": "#00677d",
            "tertiary-container": "#565d66",
            "error-container": "#ffdad6",
            "surface-dim": "#cbdbf5",
            "primary-fixed-dim": "#aac7ff",
            "on-tertiary-fixed-variant": "#404750"
          },
          borderRadius: {
            DEFAULT: "0.125rem",
            lg: "0.25rem",
            xl: "0.5rem",
            full: "0.75rem"
          },
          spacing: {
            "space-2xl": "4rem",
            margin: "2rem",
            "space-md": "1rem",
            "space-xs": "0.25rem",
            "space-xl": "2.5rem",
            "margin-mobile": "1.25rem",
            "gutter-mobile": "1rem",
            "space-3xl": "6rem",
            "space-lg": "1.5rem",
            "space-sm": "0.5rem",
            gutter: "1.5rem"
          },
          fontFamily: {
            "headline-lg": ["Space Grotesk"],
            "display-hero": ["Space Grotesk"],
            "headline-lg-mobile": ["Space Grotesk"],
            "body-md": ["Hanken Grotesk"],
            "label-lg": ["Space Grotesk"],
            "label-md": ["Space Grotesk"],
            "headline-sm": ["Space Grotesk"],
            "body-lg": ["Hanken Grotesk"],
            "headline-md": ["Space Grotesk"],
            "label-sm": ["Space Grotesk"],
            "display-hero-mobile": ["Space Grotesk"],
            "body-sm": ["Hanken Grotesk"]
          },
          fontSize: {
            "headline-lg": ["32px", { lineHeight: "40px", letterSpacing: "-0.02em", fontWeight: "600" }],
            "display-hero": ["56px", { lineHeight: "64px", letterSpacing: "-0.03em", fontWeight: "700" }],
            "headline-lg-mobile": ["26px", { lineHeight: "34px", letterSpacing: "-0.01em", fontWeight: "600" }],
            "body-md": ["15px", { lineHeight: "24px", fontWeight: "400" }],
            "label-lg": ["15px", { lineHeight: "20px", letterSpacing: "0.02em", fontWeight: "600" }],
            "label-md": ["13px", { lineHeight: "18px", letterSpacing: "0.04em", fontWeight: "500" }],
            "headline-sm": ["18px", { lineHeight: "26px", fontWeight: "600" }],
            "body-lg": ["17px", { lineHeight: "28px", fontWeight: "400" }],
            "headline-md": ["22px", { lineHeight: "30px", letterSpacing: "-0.01em", fontWeight: "600" }],
            "label-sm": ["11px", { lineHeight: "16px", letterSpacing: "0.06em", fontWeight: "600" }],
            "display-hero-mobile": ["34px", { lineHeight: "42px", letterSpacing: "-0.02em", fontWeight: "700" }],
            "body-sm": ["13px", { lineHeight: "20px", fontWeight: "400" }]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-background font-body-md text-on-surface antialiased selection:bg-primary selection:text-on-primary">

  <!-- STICKY HEADER WITH SMOOTH NAVIGATION & DROPDOWN -->
  <header class="fixed top-0 left-0 right-0 z-50 bg-surface-dark/95 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.25)] border-b border-surface-container-highest/10 transition-all duration-300">
    <div class="h-20 max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between gap-6">
      <!-- Dealer Brand Logo -->
      <a href="#beranda" class="flex items-center gap-4 shrink-0 group focus:outline-none">
        <img alt="BYD Medan Logo" class="h-8 w-auto object-contain transition-transform duration-300 group-hover:scale-105" src="{{ asset('images/byd_auto_logo.png') }}"/>
        <div class="flex flex-col">
          <span class="font-label-lg text-label-lg text-surface tracking-wider uppercase leading-tight group-hover:text-ev-cyan transition-colors">BYD Arista</span>
          <span class="font-label-sm text-label-sm text-secondary-fixed-dim uppercase tracking-widest leading-none">Cemara Medan</span>
        </div>
      </a>

      <!-- Desktop Navigation Menu with Smooth Transitions -->
      <nav id="desktopNav" class="hidden xl:flex items-center gap-1 bg-surface-dark/70 p-1.5 rounded-2xl border border-surface-container-highest/20 shadow-inner">
        <!-- Beranda -->
        <a class="nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300 flex items-center gap-1.5" data-section="beranda" href="#beranda">
          <span>Beranda</span>
        </a>

        <!-- Model with Smooth Dropdown Menu -->
        <div class="relative group">
          <a class="nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300 inline-flex items-center gap-1" data-section="katalog-model" href="#katalog-model">
            <span>Model</span>
            <span class="material-symbols-outlined text-[16px] transition-transform duration-300 group-hover:rotate-180">keyboard_arrow_down</span>
          </a>
          <!-- Dropdown items with smooth fade & translate -->
          <div class="absolute top-full left-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-2 group-hover:translate-y-0 transition-all duration-200 ease-out flex flex-col w-56 py-2 mt-2 bg-surface-dark/95 backdrop-blur-2xl rounded-2xl shadow-2xl shadow-black/60 border border-surface-container-highest/20 z-50">
            <div class="px-4 py-1.5 text-[11px] font-semibold text-secondary-fixed-dim uppercase tracking-wider border-b border-surface-container-highest/10">
              Pilih Model EV
            </div>
            @forelse($catalogs as $cat)
              <a class="px-4 py-2.5 font-label-md text-label-md text-surface/80 hover:bg-primary-container hover:text-on-primary transition-all flex items-center justify-between" href="#model-{{ Str::slug($cat->nama_produk) }}">
                <span>{{ $cat->nama_produk }}</span>
                <span class="text-[11px] text-ev-cyan font-semibold">{{ $cat->formatted_harga }}</span>
              </a>
            @empty
              <span class="px-4 py-2 text-xs text-outline">Belum ada model</span>
            @endforelse
            <div class="px-3 pt-2 mt-1 border-t border-surface-container-highest/10">
              <a class="w-full py-2 px-3 rounded-lg bg-surface-container-highest/20 hover:bg-primary text-center font-label-sm text-label-sm text-surface block transition-colors" href="#katalog-model">
                Lihat Semua Katalog &rarr;
              </a>
            </div>
          </div>
        </div>

        <!-- Pricelist Section Link -->
        <a class="nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300" data-section="pricelist" href="#pricelist">
          <span>Pricelist</span>
        </a>

        <!-- Simulasi Kredit Section Link -->
        <a class="nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300" data-section="simulasi-kredit" href="#simulasi-kredit">
          <span>Simulasi Kredit</span>
        </a>

        <!-- Testimonial Section Link -->
        <a class="nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300" data-section="testimonial" href="#testimonial">
          <span>Testimonial</span>
        </a>

        <!-- Lokasi Section Link -->
        <a class="nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300" data-section="lokasi" href="#lokasi">
          <span>Lokasi</span>
        </a>
      </nav>

      <!-- Right Contact Action & Mobile Menu Toggle -->
      <div class="flex items-center gap-3 shrink-0">
        <!-- Direct Call Sales -->
        <a class="hidden sm:inline-flex items-center gap-2 bg-primary-container hover:bg-primary text-on-primary px-4 py-2.5 rounded-xl font-label-md text-label-md transition-all shadow-md shadow-primary/20 hover:shadow-primary/40 transform hover:-translate-y-0.5" href="tel:{{ $profile->nomor_telepon ?? '082368827959' }}">
          <span class="material-symbols-outlined text-[18px]">call</span>
          <span>{{ $profile->nomor_telepon ?? '082368827959' }}</span>
        </a>

        <!-- WhatsApp Quick Chat Button -->
        <a class="w-10 h-10 rounded-xl bg-whatsapp-green hover:brightness-110 flex items-center justify-center text-surface shadow-md shadow-whatsapp-green/20 transition-all transform hover:scale-105" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya ingin konsultasi mobil BYD Medan') }}" target="_blank" title="Chat Sales Supervisor via WhatsApp">
          <span class="material-symbols-outlined text-[20px]">chat</span>
        </a>

        <!-- Mobile Hamburger Button -->
        <button id="mobileMenuToggle" class="xl:hidden w-10 h-10 rounded-xl bg-surface-container-highest/20 hover:bg-surface-container-highest/40 flex items-center justify-center text-surface transition-colors focus:outline-none" aria-label="Buka menu navigasi">
          <span id="menuIconOpen" class="material-symbols-outlined text-[24px]">menu</span>
          <span id="menuIconClose" class="material-symbols-outlined text-[24px] hidden">close</span>
        </button>
      </div>
    </div>

    <!-- Responsive Mobile Drawer Menu with Smooth Accordion -->
    <div id="mobileMenu" class="xl:hidden hidden border-t border-surface-container-highest/20 bg-surface-dark/98 backdrop-blur-2xl px-6 py-5 max-h-[calc(100vh-5rem)] overflow-y-auto transition-all duration-300">
      <div class="flex flex-col gap-2">
        <a class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-xl font-label-md text-label-md text-surface hover:bg-primary-container hover:text-on-primary transition-colors" href="#beranda">
          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">home</span>
            <span>Beranda</span>
          </span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>

        <!-- Mobile Model Collapsible Dropdown -->
        <div class="flex flex-col">
          <button id="mobileModelToggle" class="w-full flex items-center justify-between px-4 py-3 rounded-xl font-label-md text-label-md text-surface hover:bg-surface-container-highest/20 transition-colors focus:outline-none">
            <span class="flex items-center gap-2">
              <span class="material-symbols-outlined text-[18px]">directions_car</span>
              <span>Model Kendaraan EV</span>
              <span class="px-2 py-0.5 rounded text-[10px] bg-primary-container text-on-primary font-bold">{{ count($catalogs) }} Unit</span>
            </span>
            <span id="mobileModelArrow" class="material-symbols-outlined text-[18px] transition-transform duration-200">expand_more</span>
          </button>
          <div id="mobileModelList" class="hidden pl-4 pr-2 py-2 flex flex-col gap-1 bg-surface-container-highest/5 rounded-xl my-1 border border-surface-container-highest/10">
            @forelse($catalogs as $cat)
              <a class="mobile-nav-link flex items-center justify-between px-3 py-2 rounded-lg text-sm text-surface/85 hover:text-ev-cyan hover:bg-surface-container-highest/20 transition-colors" href="#model-{{ Str::slug($cat->nama_produk) }}">
                <span>{{ $cat->nama_produk }}</span>
                <span class="text-xs text-outline">{{ $cat->formatted_harga }}</span>
              </a>
            @empty
              <span class="px-3 py-1 text-xs text-outline">Belum ada model</span>
            @endforelse
            <a class="mobile-nav-link block text-center py-2 text-xs font-semibold text-ev-cyan hover:underline" href="#katalog-model">
              Buka Katalog Lengkap &rarr;
            </a>
          </div>
        </div>

        <a class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-xl font-label-md text-label-md text-surface hover:bg-primary-container hover:text-on-primary transition-colors" href="#pricelist">
          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">receipt_long</span>
            <span>Pricelist OTR Medan</span>
          </span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>

        <a class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-xl font-label-md text-label-md text-surface hover:bg-primary-container hover:text-on-primary transition-colors" href="#simulasi-kredit">
          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">calculate</span>
            <span>Simulasi Kredit</span>
          </span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>

        <a class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-xl font-label-md text-label-md text-surface hover:bg-primary-container hover:text-on-primary transition-colors" href="#testimonial">
          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">reviews</span>
            <span>Testimonial Konsumen</span>
          </span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>

        <a class="mobile-nav-link flex items-center justify-between px-4 py-3 rounded-xl font-label-md text-label-md text-surface hover:bg-primary-container hover:text-on-primary transition-colors" href="#lokasi">
          <span class="flex items-center gap-2">
            <span class="material-symbols-outlined text-[18px]">location_on</span>
            <span>Lokasi Dealer & Bengkel</span>
          </span>
          <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>

        <!-- Mobile Quick Contact -->
        <div class="pt-4 mt-2 border-t border-surface-container-highest/20 flex flex-col gap-2.5">
          <a class="w-full py-3 px-4 rounded-xl bg-whatsapp-green text-surface font-label-md text-label-md flex items-center justify-center gap-2 shadow-md shadow-whatsapp-green/20" href="https://wa.me/6282368827959?text=Halo%20Keldy%20Sietra,%20saya%20ingin%20tanya%20harga%20dan%20promo%20mobil%20BYD" target="_blank">
            <span class="material-symbols-outlined text-[20px]">chat</span>
            <span>WhatsApp Sales (082368827959)</span>
          </a>
          <a class="w-full py-3 px-4 rounded-xl bg-surface-container-highest/20 text-surface font-label-md text-label-md flex items-center justify-center gap-2" href="tel:082368827959">
            <span class="material-symbols-outlined text-[20px]">call</span>
            <span>Telepon Langsung</span>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- MAIN WRAPPER -->
  <main class="w-full pt-20 bg-background">
    <div class="flex flex-col w-full">

      <!-- 1. HERO SHOWCASE SECTION -->
      <section id="beranda" class="relative w-full overflow-hidden bg-surface-dark text-surface scroll-mt-20">
        <!-- Atmospheric Ambient Lighting Gradient behind Car -->
        <div class="absolute -top-40 right-1/4 w-[600px] h-[600px] bg-primary-container/25 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute bottom-0 right-10 w-[450px] h-[450px] bg-secondary-container/15 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-12 pt-12 pb-20 lg:pt-16 lg:pb-28">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <!-- Hero Text & Quick Action -->
            <div class="lg:col-span-5 flex flex-col gap-6 z-10">
              <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-surface-container-highest/20 w-max border border-surface-container-highest/20">
                <span class="w-2 h-2 rounded-full bg-ev-cyan animate-pulse"></span>
                <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed-dim">Official Dealer &bull; Sumatera Utara</span>
              </div>
              <div class="flex flex-col gap-2">
                <h1 class="font-display-hero text-display-hero text-surface tracking-tight leading-[1.08]">
                  Masa Depan <span class="text-gradient-ev text-transparent bg-clip-text bg-gradient-to-r from-ev-cyan via-secondary-fixed-dim to-surface">Mobilitas Listrik</span> di Kota Medan.
                </h1>
                <p class="font-body-lg text-body-lg text-surface/75 leading-relaxed pt-2">
                  Jelajahi teknologi revolusioner Blade Battery bersama <strong>{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}</strong>. Dapatkan promo OTR Medan, bunga subsidi 0%, dan unit siap test drive.
                </p>
              </div>

              <!-- CTAs with Smooth In-Page Links -->
              <div class="flex flex-wrap items-center gap-4 pt-2">
                <a class="px-6 py-3.5 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg transition-all shadow-lg shadow-primary-container/30 flex items-center gap-2 hover:shadow-primary-container/50 transform hover:-translate-y-0.5" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya tertarik dengan Promo OTR BYD Medan') }}" target="_blank">
                  <span class="material-symbols-outlined text-[20px]">electric_bolt</span>
                  <span>Promo OTR Medan</span>
                </a>
                <a class="px-6 py-3.5 rounded-xl bg-surface-container-highest/20 hover:bg-surface-container-highest/30 text-surface font-label-lg text-label-lg transition-all flex items-center gap-2 border border-surface-container-highest/20 transform hover:-translate-y-0.5" href="#katalog-model">
                  <span class="material-symbols-outlined text-[20px]">directions_car</span>
                  <span>Katalog Model</span>
                </a>
                <a class="px-5 py-3.5 rounded-xl bg-surface-dark hover:bg-surface-container-highest/20 text-ev-cyan font-label-lg text-label-lg transition-all flex items-center gap-2 border border-ev-cyan/30" href="#pricelist">
                  <span class="material-symbols-outlined text-[20px]">receipt_long</span>
                  <span>Cek Pricelist</span>
                </a>
              </div>

              <!-- Quick Metrics Bar -->
              <div class="grid grid-cols-3 gap-4 pt-6 border-t border-surface-container-highest/20">
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-surface font-bold">{{ count($catalogs) }} Model</span>
                  <span class="font-label-sm text-label-sm text-surface/60 uppercase">EV Resmi 2025</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-ev-cyan font-bold">8 Tahun</span>
                  <span class="font-label-sm text-label-sm text-surface/60 uppercase">Garansi Blade Baterai</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-surface font-bold">100% ACC</span>
                  <span class="font-label-sm text-label-sm text-surface/60 uppercase">Bantuan Kredit Sales</span>
                </div>
              </div>
            </div>

            <!-- Hero Cinematic Vehicle Visual -->
            <div class="lg:col-span-7 relative flex justify-center items-center">
              <div class="relative w-full aspect-[16/10] rounded-2xl overflow-hidden shadow-2xl bg-surface-dark border border-surface-container-highest/10">
                <img class="w-full h-full object-cover" data-alt="{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}" src="{{ $profile->hero_photo_url }}"/>
                <!-- Gradient Overlay for Contrast -->
                <div class="absolute inset-0 bg-gradient-to-t from-surface-dark/90 via-surface-dark/20 to-transparent"></div>
                <!-- Floating Card Highlight -->
                <div class="absolute bottom-6 left-6 right-6 p-4 rounded-xl bg-surface-dark/85 backdrop-blur-md flex flex-wrap items-center justify-between gap-4 border border-surface-container-highest/20 shadow-xl">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center text-on-primary shadow-md">
                      <span class="material-symbols-outlined text-[22px]">speed</span>
                    </div>
                    <div class="flex flex-col">
                      <span class="font-headline-sm text-headline-sm text-surface">{{ $profile->nama_produk ?? 'BYD EV Official' }}</span>
                      <span class="font-label-sm text-label-sm text-secondary-fixed-dim">Teknologi Blade Battery &bull; Garansi 8 Tahun</span>
                    </div>
                  </div>
                  <a class="px-4 py-2 rounded-xl bg-ev-cyan hover:bg-secondary-container text-on-secondary-fixed font-label-md text-label-md transition-colors flex items-center gap-1.5 shrink-0 shadow-md font-semibold" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya ingin booking Test Drive Mobil BYD Medan') }}" target="_blank">
                    <span class="material-symbols-outlined text-[18px]">key</span>
                    <span>Booking Test Drive</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 2. INTRO & SALES ADVISOR PROFILE -->
      <section id="profil-sales" class="w-full py-space-2xl bg-surface scroll-mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <!-- Left Editorial Description -->
            <div class="lg:col-span-8 flex flex-col gap-6">
              <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-primary"></span>
                <span class="font-label-md text-label-md uppercase tracking-wider text-primary">{{ $profile->nama_produk ?? 'Dealer Resmi BYD Arista Cemara Medan' }}</span>
              </div>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">
                Selamat Datang di Dealer Resmi Mobil BYD Medan
              </h2>
              <p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
                Bingung urusan jual beli mobil BYD di Medan? Tenang saja! Percayakan sepenuhnya kepada dealer resmi kami. Salah satu Sales Representative Senior berprestasi kami, <strong>{{ $profile->nama_sales ?? 'Keldy Sietra' }}</strong>, siap membimbing dan melayani Anda untuk menemukan kendaraan listrik paling tepat sesuai kebutuhan personal maupun keluarga Anda di Sumatera Utara.
              </p>
              <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                Dealer kami melayani seluruh tahapan pembelian mulai dari konsultasi unit, konsultasi subsidi, penawaran diskon spesial tunai maupun kredit, uji coba test drive ke rumah/kantor, hingga pengantaran plat resmi dan serah terima unit dengan jaminan transparansi penuh.
              </p>

              <!-- 4 Steps Purchasing Workflow -->
              <div class="pt-6">
                <div class="mb-4">
                  <span class="font-headline-sm text-headline-sm text-on-surface">4 Langkah Mudah Memiliki BYD Impian Anda</span>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                  <!-- Step 1 -->
                  <a href="#katalog-model" class="bg-surface-card p-5 rounded-xl shadow-sm flex flex-col gap-3 group hover:shadow-md transition-all border border-border-subtle/50">
                    <div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                      <span class="material-symbols-outlined text-[24px]">travel_explore</span>
                    </div>
                    <div class="flex flex-col">
                      <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Langkah 01</span>
                      <span class="font-headline-sm text-headline-sm text-on-surface mt-1 group-hover:text-primary transition-colors">Cari Mobil Baru</span>
                      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Pilih tipe sedan, SUV, MPV, atau compact hatchback.</p>
                    </div>
                  </a>
                  <!-- Step 2 -->
                  <a href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya ingin konsultasi unit dan test drive BYD') }}" target="_blank" class="bg-surface-card p-5 rounded-xl shadow-sm flex flex-col gap-3 group hover:shadow-md transition-all border border-border-subtle/50">
                    <div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                      <span class="material-symbols-outlined text-[24px]">support_agent</span>
                    </div>
                    <div class="flex flex-col">
                      <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Langkah 02</span>
                      <span class="font-headline-sm text-headline-sm text-on-surface mt-1 group-hover:text-primary transition-colors">Hubungi Kami</span>
                      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Konsultasikan simulasi kredit &amp; jadwalkan test drive gratis.</p>
                    </div>
                  </a>
                  <!-- Step 3 -->
                  <a href="#simulasi-kredit" class="bg-surface-card p-5 rounded-xl shadow-sm flex flex-col gap-3 group hover:shadow-md transition-all border border-border-subtle/50">
                    <div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                      <span class="material-symbols-outlined text-[24px]">payments</span>
                    </div>
                    <div class="flex flex-col">
                      <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Langkah 03</span>
                      <span class="font-headline-sm text-headline-sm text-on-surface mt-1 group-hover:text-primary transition-colors">Transaksi Mudah</span>
                      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Berkas dijemput, proses DP ringan dibantu sampai ACC.</p>
                    </div>
                  </a>
                  <!-- Step 4 -->
                  <a href="#testimonial" class="bg-surface-card p-5 rounded-xl shadow-sm flex flex-col gap-3 group hover:shadow-md transition-all border border-border-subtle/50">
                    <div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                      <span class="material-symbols-outlined text-[24px]">celebration</span>
                    </div>
                    <div class="flex flex-col">
                      <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Langkah 04</span>
                      <span class="font-headline-sm text-headline-sm text-on-surface mt-1 group-hover:text-primary transition-colors">Serah Terima</span>
                      <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Pengiriman unit ke rumah dengan suvenir &amp; bonus komplit.</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <!-- Right Sales Representative Spotlight Card -->
            <div class="lg:col-span-4 w-full">
              <div class="bg-surface-card rounded-2xl p-6 shadow-md flex flex-col gap-5 border border-border-subtle/50">
                <!-- Dealer Badge -->
                <div class="flex items-center justify-between">
                  <span class="px-3 py-1 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm uppercase tracking-wide font-semibold">
                    {{ $profile->jabatan_sales ?? 'Sales Supervisor Resmi' }}
                  </span>
                  <span class="material-symbols-outlined text-whatsapp-green text-[22px]">verified</span>
                </div>
                <!-- Profile Photo -->
                <div class="w-full h-64 rounded-xl overflow-hidden bg-surface-muted relative shadow-inner">
                  <img class="w-full h-full object-cover" data-alt="{{ $profile->nama_sales ?? 'Keldy Sietra' }}" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRCckEqhGNeUQPaO1ZoO20-inEAEa7pWM58wagAQhT5h5bJAm4wwwjwIJvim0NPGuf05F-3sLvoFeFJawS7711aQsWF3UlJ-gwCgcuDiWN8OPXBwpAlHPj6NGPQTnGOPH_APFcnR-5yx4YZKOFOJjPsZU5bFjcEB0U0scyqcOTqBUNzI8daHKEfbW0neQTA_uE_ToC3bu9kd8MuvhnNxfVfS7fWH1WfqJw3edFXAASsg0STBuF92798w"/>
                  <div class="absolute bottom-3 left-3 bg-surface-dark/80 backdrop-blur-sm px-3 py-1 rounded-xl text-surface font-label-sm text-label-sm">
                    {{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}
                  </div>
                </div>
                <!-- Supervisor Bio Details -->
                <div class="flex flex-col gap-1">
                  <h3 class="font-headline-md text-headline-md text-on-surface font-bold">{{ $profile->nama_sales ?? 'Keldy Sietra' }}</h3>
                  <p class="font-body-md text-body-md text-on-surface-variant">{{ $profile->jabatan_sales ?? 'Sales Supervisor BYD Medan' }}</p>
                  <div class="flex items-center gap-1.5 text-primary mt-1 font-label-md text-label-md">
                    <span class="material-symbols-outlined text-[18px]">verified_user</span>
                    <span>Berpengalaman &amp; Terpercaya</span>
                  </div>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                  "{{ $profile->keterangan_profil ?? 'Siap membantu Anda 24/7 untuk konsultasi unit, penawaran diskon terbaik, tukar tambah (trade-in), serta pengajuan kredit termudah di Medan.' }}"
                </p>
                <!-- Direct Contact Actions -->
                <div class="flex flex-col gap-2.5 pt-2">
                  <a class="w-full py-3 px-4 rounded-xl bg-whatsapp-green hover:brightness-105 text-surface font-label-lg text-label-lg flex items-center justify-center gap-2 transition-all shadow-md shadow-whatsapp-green/20" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya ingin tanya harga dan promo mobil BYD') }}" target="_blank">
                    <span class="material-symbols-outlined text-[20px]">chat</span>
                    <span>Chat via WhatsApp ({{ $profile->nomor_telepon ?? '082368827959' }})</span>
                  </a>
                  <a class="w-full py-3 px-4 rounded-xl bg-surface-container hover:bg-surface-container-high text-primary font-label-lg text-label-lg flex items-center justify-center gap-2 transition-all" href="tel:{{ $profile->nomor_telepon ?? '082368827959' }}">
                    <span class="material-symbols-outlined text-[20px]">call</span>
                    <span>Hubungi Telepon Langsung</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 3. SHOWROOM CATALOG / PILIH MODEL -->
      <section id="katalog-model" class="w-full py-space-3xl bg-surface-muted scroll-mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-8">
          <!-- Section Header -->
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex flex-col gap-2">
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[24px]">grid_view</span>
                <span class="font-label-lg text-label-lg uppercase tracking-wider text-primary">Katalog Kendaraan Listrik</span>
              </div>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">Pilih Model BYD Medan</h2>
              <p class="font-body-md text-body-md text-on-surface-variant">Seluruh tipe resmi bergaransi ATPM dengan harga ter-update On The Road (OTR) Medan 2025.</p>
            </div>
            <div class="shrink-0 flex items-center gap-3">
              <a class="inline-flex items-center gap-2 font-label-md text-label-md text-primary hover:text-primary-container font-semibold transition-colors bg-surface-card px-4 py-2.5 rounded-xl shadow-sm" href="#pricelist">
                <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                <span>Lihat Tabel Pricelist</span>
              </a>
              <a class="inline-flex items-center gap-2 font-label-md text-label-md bg-primary-container text-on-primary hover:bg-primary font-semibold transition-colors px-4 py-2.5 rounded-xl shadow-sm" href="https://wa.me/6282368827959?text=Halo%20Keldy,%20kirimkan%20e-brochure%20lengkap%20semua%20tipe%20BYD" target="_blank">
                <span>Minta Brosur PDF</span>
                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
              </a>
            </div>
          </div>

          <!-- Vehicle Grid: 6 Distinct Models with Direct Anchors -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($catalogs as $catalog)
              <div id="model-{{ Str::slug($catalog->nama_produk) }}" class="car-card bg-surface-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col group scroll-mt-24 border border-border-subtle/50">
                <div class="relative w-full aspect-[16/10] overflow-hidden bg-surface-dark">
                  <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $catalog->nama_produk }}" src="{{ $catalog->first_photo_url }}"/>
                  @if(count($catalog->photo_urls) > 1)
                    <span class="absolute top-3 right-3 px-3 py-1 rounded-full bg-surface-dark/85 backdrop-blur-sm text-ev-cyan font-label-sm text-label-sm font-semibold flex items-center gap-1">
                      <span class="material-symbols-outlined text-[14px]">photo_library</span>
                      <span>{{ count($catalog->photo_urls) }} Foto</span>
                    </span>
                  @endif
                  <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-primary-container text-on-primary font-label-sm text-label-sm font-semibold">
                    Mobil Listrik Resmi
                  </span>
                </div>
                <div class="p-6 flex flex-col flex-1 justify-between gap-4">
                  <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                      <h3 class="font-headline-md text-headline-md text-on-surface font-bold group-hover:text-primary transition-colors">
                        {{ $catalog->nama_produk }}
                      </h3>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2">
                      {{ $catalog->keterangan }}
                    </p>
                    <div class="flex items-baseline gap-1.5 pt-2">
                      <span class="font-body-sm text-body-sm text-outline">Harga OTR mulai</span>
                      <span class="font-headline-md text-headline-md text-primary font-bold">{{ $catalog->formatted_harga }}</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-2 pt-2">
                    <a href="{{ route('katalog.detail', $catalog->slug) }}" class="w-full py-2.5 px-3 rounded-xl bg-surface-dark hover:bg-surface-dark/85 text-surface font-label-md text-label-md transition-colors text-center flex items-center justify-center gap-1.5 font-semibold shadow-sm">
                      <span class="material-symbols-outlined text-[18px]">visibility</span>
                      <span>Lihat Detail Unit</span>
                    </a>
                    <div class="grid grid-cols-2 gap-2">
                      <button class="py-2.5 px-3 rounded-xl bg-surface-container hover:bg-surface-container-high text-primary font-label-md text-label-md transition-colors text-center font-medium" onclick="pilihModelKredit('{{ $catalog->nama_produk }}', {{ $catalog->harga }})">
                        Hitung Kredit
                      </button>
                      <a class="py-2.5 px-3 rounded-xl bg-whatsapp-green hover:brightness-105 text-surface font-label-md text-label-md transition-colors text-center font-medium flex items-center justify-center gap-1" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya tertarik dengan unit ' . $catalog->nama_produk . ' seharga ' . $catalog->formatted_harga) }}" target="_blank">
                        <span>Tanya Promo</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-span-full p-8 text-center bg-surface-card rounded-2xl border border-border-subtle text-on-surface-variant">
                Belum ada katalog unit yang ditambahkan.
              </div>
            @endforelse


          </div>
        </div>
      </section>

      <!-- 4. DEDICATED PRICELIST SECTION (DAFTAR HARGA OTR MEDAN 2025) -->
      <section id="pricelist" class="w-full py-space-3xl bg-surface scroll-mt-20 border-y border-border-subtle/40">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-8">
          <!-- Section Header -->
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex flex-col gap-2">
              <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-container/10 text-primary w-max">
                <span class="material-symbols-outlined text-[18px]">receipt_long</span>
                <span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Daftar Harga Resmi 2025</span>
              </div>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">Pricelist OTR BYD Medan 2025</h2>
              <p class="font-body-md text-body-md text-on-surface-variant">
                Harga On The Road (OTR) resmi Medan & sekitarnya. Termasuk subsidi PPN, garansi baterai 8 tahun, dan bonus wallbox charger.
              </p>
            </div>
            <!-- Category Filter Pills -->
            <div class="flex flex-wrap items-center gap-2" id="pricelistFilterGroup">
              <button class="price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-primary-container text-on-primary transition-all shadow-sm" onclick="filterPricelist('all', this)">Semua</button>
              <button class="price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="filterPricelist('sedan', this)">Sedan</button>
              <button class="price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="filterPricelist('suv', this)">SUV</button>
              <button class="price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="filterPricelist('mpv', this)">MPV 7-Seat</button>
              <button class="price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="filterPricelist('compact', this)">City & Hatchback</button>
            </div>
          </div>

          <!-- Comprehensive Responsive Pricing Table / Cards -->
          <div class="bg-surface-card rounded-2xl shadow-md border border-border-subtle/60 overflow-hidden">
            <!-- Table Header for Medium+ Screens -->
            <div class="hidden lg:grid grid-cols-12 gap-4 px-6 py-4 bg-surface-muted font-label-md text-label-md text-on-surface font-semibold border-b border-border-subtle">
              <div class="col-span-4">Model &amp; Varian</div>
              <div class="col-span-2 text-center">Jarak Tempuh</div>
              <div class="col-span-2 text-right">Harga OTR Medan</div>
              <div class="col-span-2 text-right">DP Mulai (20%)</div>
              <div class="col-span-2 text-center">Aksi Cepat</div>
            </div>

            <!-- Price Items List -->
            <div class="divide-y divide-border-subtle/50" id="pricelistContainer">

              @forelse($catalogs as $cat)
                <div class="price-item p-5 lg:px-6 lg:py-4 grid grid-cols-1 lg:grid-cols-12 gap-3 lg:gap-4 items-center hover:bg-surface-container-low transition-colors" data-category="all">
                  <div class="lg:col-span-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-primary-container/10 text-primary flex items-center justify-center shrink-0">
                      <span class="material-symbols-outlined text-[20px]">electric_car</span>
                    </div>
                    <div>
                      <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $cat->nama_produk }}</h4>
                      <span class="font-body-sm text-body-sm text-outline">{{ Str::limit($cat->keterangan, 50) }}</span>
                    </div>
                  </div>
                  <div class="lg:col-span-2 flex lg:justify-center items-center gap-1.5 text-sm text-on-surface-variant">
                    <a href="{{ route('katalog.detail', $cat->slug) }}" class="px-2.5 py-1 rounded-full bg-surface-container font-semibold text-primary text-xs hover:bg-primary hover:text-on-primary transition-colors inline-flex items-center gap-1">
                      <span>Detail Unit</span>
                      <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                    </a>
                  </div>
                  <div class="lg:col-span-2 flex lg:justify-end items-baseline gap-1">
                    <span class="lg:hidden text-outline text-xs">OTR Medan:</span>
                    <span class="font-headline-sm text-headline-sm text-primary font-bold">{{ $cat->formatted_harga }}</span>
                  </div>
                  <div class="lg:col-span-2 flex lg:justify-end items-baseline gap-1">
                    <span class="lg:hidden text-outline text-xs">DP Mulai (20%):</span>
                    <span class="text-sm font-semibold text-on-surface">Rp {{ number_format($cat->harga * 0.20, 0, ',', '.') }}</span>
                  </div>
                  <div class="lg:col-span-2 flex items-center gap-2 justify-end lg:justify-center pt-2 lg:pt-0">
                    <button class="py-2 px-3 rounded-xl bg-surface-container hover:bg-primary-container hover:text-on-primary text-primary font-label-sm text-label-sm transition-all" onclick="pilihModelKredit('{{ $cat->nama_produk }}', {{ $cat->harga }})">
                      Hitung Kredit
                    </button>
                    <a class="py-2 px-3 rounded-xl bg-whatsapp-green text-surface hover:brightness-105 font-label-sm text-label-sm transition-all flex items-center gap-1" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya tertarik dengan promo ' . $cat->nama_produk . ' seharga ' . $cat->formatted_harga) }}" target="_blank">
                      <span class="material-symbols-outlined text-[16px]">chat</span>
                      <span>Tanya</span>
                    </a>
                  </div>
                </div>
              @empty
                <div class="p-6 text-center text-outline">Belum ada pricelist unit.</div>
              @endforelse





            </div>
          </div>

          <!-- Package Bonus Guarantee Cards -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-4">
            <div class="p-4 rounded-xl bg-surface-card border border-border-subtle shadow-sm flex items-start gap-3">
              <span class="material-symbols-outlined text-ev-cyan text-[28px] mt-0.5">verified_user</span>
              <div>
                <h5 class="font-label-md text-label-md text-on-surface font-bold">Garansi Baterai 8 Thn</h5>
                <p class="font-body-sm text-body-sm text-on-surface-variant text-xs">Hingga 160.000 KM jaminan kesehatan baterai &gt;70%.</p>
              </div>
            </div>
            <div class="p-4 rounded-xl bg-surface-card border border-border-subtle shadow-sm flex items-start gap-3">
              <span class="material-symbols-outlined text-primary text-[28px] mt-0.5">ev_charger</span>
              <div>
                <h5 class="font-label-md text-label-md text-on-surface font-bold">Free Home Charger 7kW</h5>
                <p class="font-body-sm text-body-sm text-on-surface-variant text-xs">Gratis wallbox charging unit dan jasa instalasi PLN.</p>
              </div>
            </div>
            <div class="p-4 rounded-xl bg-surface-card border border-border-subtle shadow-sm flex items-start gap-3">
              <span class="material-symbols-outlined text-whatsapp-green text-[28px] mt-0.5">build_circle</span>
              <div>
                <h5 class="font-label-md text-label-md text-on-surface font-bold">Free Service 4 Thn</h5>
                <p class="font-body-sm text-body-sm text-on-surface-variant text-xs">Gratis biaya jasa &amp; spare part berkala 60.000 KM.</p>
              </div>
            </div>
            <div class="p-4 rounded-xl bg-surface-card border border-border-subtle shadow-sm flex items-start gap-3">
              <span class="material-symbols-outlined text-secondary text-[28px] mt-0.5">card_giftcard</span>
              <div>
                <h5 class="font-label-md text-label-md text-on-surface font-bold">Bonus Komplit Dealer</h5>
                <p class="font-body-sm text-body-sm text-on-surface-variant text-xs">Kaca film berkualitas, kabel V2L, karpet set, suvenir.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 5. INTERACTIVE CREDIT CALCULATOR / SIMULASI KREDIT -->
      <section id="simulasi-kredit" class="w-full py-space-3xl bg-surface-muted scroll-mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-stretch">
            <!-- Left: Form Controls -->
            <div class="lg:col-span-7 bg-surface-card p-8 rounded-2xl shadow-md flex flex-col justify-between gap-6 border border-border-subtle/50">
              <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-primary text-[24px]">calculate</span>
                  <span class="font-label-md text-label-md uppercase tracking-wider text-primary">Kalkulator Pembiayaan Resmi</span>
                </div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Simulasi Kredit BYD Medan</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">
                  Rencanakan pembiayaan kendaraan listrik Anda dengan mudah. Hitung estimasi DP dan cicilan bulanan sesuai budget finansial Anda.
                </p>
              </div>

              <!-- Input Fields -->
              <form class="flex flex-col gap-5" id="loanCalcForm" onsubmit="event.preventDefault(); hitungSimulasi();">
                <!-- Model Preset Dropdown -->
                <div class="flex flex-col gap-1.5">
                  <label class="font-label-md text-label-md text-on-surface font-semibold" for="calcModelSelect">Pilih Model Kendaraan</label>
                  <select class="w-full px-4 py-3 rounded-xl bg-surface-muted text-on-surface font-body-md text-body-md border border-border-subtle focus:border-primary focus:outline-none transition-colors" id="calcModelSelect" onchange="updateHargaFromPreset(this.value)">
                    @forelse($catalogs as $index => $cat)
                      <option value="{{ $cat->harga }}" {{ $index === 0 ? 'selected' : '' }}>{{ $cat->nama_produk }} - {{ $cat->formatted_harga }}</option>
                    @empty
                      <option value="403000000">BYD M6 - Rp 403.000.000</option>
                    @endforelse
                  </select>
                </div>

                <!-- Price Input -->
                <div class="flex flex-col gap-1.5">
                  <label class="font-label-md text-label-md text-on-surface font-semibold" for="calcHarga">Harga Kendaraan OTR (Rp)</label>
                  <input class="w-full px-4 py-3 rounded-xl bg-surface-muted text-on-surface font-body-md text-body-md border border-border-subtle focus:border-primary focus:outline-none transition-colors" id="calcHarga" required="" type="number" value="{{ $catalogs->first()?->harga ?? 403000000 }}" oninput="hitungSimulasi()"/>
                </div>

                <!-- DP & Interest Rate Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface font-semibold" for="calcDpPercent">Uang Muka / DP (%)</label>
                    <div class="flex items-center gap-2">
                      <input class="w-full px-4 py-3 rounded-xl bg-surface-muted text-on-surface font-body-md text-body-md border border-border-subtle focus:border-primary focus:outline-none transition-colors" id="calcDpPercent" max="90" min="10" required="" type="number" value="20" oninput="hitungSimulasi()"/>
                      <span class="font-label-lg text-label-lg text-outline">%</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface font-semibold" for="calcBunga">Suku Bunga (% per Tahun)</label>
                    <div class="flex items-center gap-2">
                      <input class="w-full px-4 py-3 rounded-xl bg-surface-muted text-on-surface font-body-md text-body-md border border-border-subtle focus:border-primary focus:outline-none transition-colors" id="calcBunga" required="" step="0.1" type="number" value="5.5" oninput="hitungSimulasi()"/>
                      <span class="font-label-lg text-label-lg text-outline">%</span>
                    </div>
                  </div>
                </div>

                <!-- Tenor Selection -->
                <div class="flex flex-col gap-1.5">
                  <label class="font-label-md text-label-md text-on-surface font-semibold">Jangka Waktu Tenor</label>
                  <div class="grid grid-cols-3 sm:grid-cols-6 gap-2">
                    <button class="tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="setTenor(1, this)" type="button">1 Thn</button>
                    <button class="tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="setTenor(2, this)" type="button">2 Thn</button>
                    <button class="tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-primary-container text-on-primary font-bold shadow-sm" onclick="setTenor(3, this)" type="button">3 Thn</button>
                    <button class="tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="setTenor(4, this)" type="button">4 Thn</button>
                    <button class="tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="setTenor(5, this)" type="button">5 Thn</button>
                    <button class="tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-surface-muted text-on-surface hover:bg-surface-container transition-all" onclick="setTenor(6, this)" type="button">6 Thn</button>
                  </div>
                  <input id="calcTenor" type="hidden" value="3"/>
                </div>

                <button class="w-full py-3.5 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-lg text-label-lg transition-all shadow-md shadow-primary-container/20 flex items-center justify-center gap-2 mt-2" type="submit">
                  <span class="material-symbols-outlined text-[20px]">sync</span>
                  <span>Hitung Angsuran Sekarang</span>
                </button>
              </form>
              <p class="font-body-sm text-body-sm text-outline italic">
                *Catatan: Perhitungan simulasi ini hanya bersifat estimasi indikatif. Skema kredit final resmi dapat disesuaikan dengan paket leasing rekanan (Maybank, BCA Finance, MTF, Mega Finance, dll).
              </p>
            </div>

            <!-- Right: Real-time Calculation Result Card -->
            <div class="lg:col-span-5 bg-surface-dark text-surface p-8 rounded-2xl shadow-xl flex flex-col justify-between gap-6 relative overflow-hidden border border-surface-container-highest/20">
              <div class="absolute -right-16 -top-16 w-52 h-52 bg-ev-cyan/10 rounded-full blur-3xl pointer-events-none"></div>
              <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between pb-4 border-b border-surface-container-highest/20">
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed-dim">Hasil Estimasi Kredit</span>
                  <span class="px-2.5 py-1 rounded bg-surface-container-highest/20 font-label-sm text-label-sm text-ev-cyan font-semibold">OTR Medan 2025</span>
                </div>
                <!-- Monthly Installment Big Display -->
                <div class="flex flex-col gap-1 p-5 rounded-xl bg-surface-container-highest/10 border border-surface-container-highest/20">
                  <span class="font-body-sm text-body-sm text-surface/70">Estimasi Cicilan per Bulan</span>
                  <div class="flex items-baseline gap-2">
                    <span class="font-display-hero text-display-hero text-ev-cyan font-bold tracking-tight" id="resultAngsuranBulanan">Rp 10.424.000</span>
                    <span class="font-body-sm text-body-sm text-surface/60">/bln</span>
                  </div>
                  <span class="font-label-sm text-label-sm text-secondary-fixed-dim mt-1 font-semibold" id="resultTenorDisplay">Tenor: 3 Tahun (36 Bulan)</span>
                </div>
                <!-- Breakdown Detail List -->
                <div class="flex flex-col gap-3 pt-2">
                  <div class="flex items-center justify-between py-2 border-b border-surface-container-highest/10">
                    <span class="font-body-md text-body-md text-surface/80">Harga Kendaraan</span>
                    <span class="font-headline-sm text-headline-sm text-surface font-semibold" id="resultHargaDisplay">Rp 403.000.000</span>
                  </div>
                  <div class="flex items-center justify-between py-2 border-b border-surface-container-highest/10">
                    <span class="font-body-md text-body-md text-surface/80">Total Uang Muka (DP)</span>
                    <span class="font-headline-sm text-headline-sm text-surface font-semibold text-secondary-fixed" id="resultTotalDp">Rp 80.600.000</span>
                  </div>
                  <div class="flex items-center justify-between py-2 border-b border-surface-container-highest/10">
                    <span class="font-body-md text-body-md text-surface/80">Pokok Pinjaman</span>
                    <span class="font-headline-sm text-headline-sm text-surface font-semibold" id="resultPokokPinjaman">Rp 322.400.000</span>
                  </div>
                  <div class="flex items-center justify-between py-2">
                    <span class="font-body-md text-body-md text-surface/80">Asuransi &amp; Layanan</span>
                    <span class="font-label-md text-label-md text-whatsapp-green font-semibold">Gratis Konsultasi &amp; App</span>
                  </div>
                </div>
              </div>

              <!-- Instant Send to Sales WA -->
              <div class="flex flex-col gap-3 pt-4">
                <a class="w-full py-3.5 px-4 rounded-xl bg-whatsapp-green hover:brightness-105 text-surface font-label-lg text-label-lg flex items-center justify-center gap-2 transition-all shadow-lg shadow-whatsapp-green/20" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya sudah hitung simulasi kredit di website. Mohon bantu prosesnya.') }}" id="btnSendWaSimulasi" target="_blank">
                  <span class="material-symbols-outlined text-[20px]">send</span>
                  <span>Ajukan Simulasi Ini ke WhatsApp Sales</span>
                </a>
                <p class="font-body-sm text-body-sm text-surface/60 text-center">
                  {{ $profile->jabatan_sales ?? 'Sales Supervisor' }} {{ $profile->nama_sales ?? 'Keldy Sietra' }} siap membantu persetujuan kredit sampai disetujui pihak leasing.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- 6. DEDICATED TESTIMONIAL & SERAH TERIMA SECTION -->
      <section id="testimonial" class="w-full py-space-3xl bg-surface scroll-mt-20 border-t border-border-subtle/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-10">
          <!-- Section Header -->
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex flex-col gap-2">
              <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-whatsapp-green/10 text-whatsapp-green w-max border border-whatsapp-green/20">
                <span class="material-symbols-outlined text-[18px]">verified</span>
                <span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Testimonial &amp; Serah Terima Resmi</span>
              </div>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">Kepuasan Pelanggan BYD Medan</h2>
              <p class="font-body-md text-body-md text-on-surface-variant">
                Lihat langsung momen bahagia serah terima unit konsumen kami di Kota Medan bersama {{ $profile->jabatan_sales ?? 'Sales Supervisor' }} {{ $profile->nama_sales ?? 'Keldy Sietra' }}.
              </p>
            </div>
            <!-- Trust Social Proof Stats -->
            <div class="flex items-center gap-4 bg-surface-card p-3 rounded-2xl shadow-sm border border-border-subtle">
              <div class="flex flex-col text-right">
                <div class="flex items-center gap-1 text-yellow-500 font-bold justify-end">
                  <span>5.0</span>
                  <div class="flex text-yellow-500 text-sm">
                    <span class="material-symbols-outlined text-[16px] fill-current">star</span>
                    <span class="material-symbols-outlined text-[16px] fill-current">star</span>
                    <span class="material-symbols-outlined text-[16px] fill-current">star</span>
                    <span class="material-symbols-outlined text-[16px] fill-current">star</span>
                    <span class="material-symbols-outlined text-[16px] fill-current">star</span>
                  </div>
                </div>
                <span class="text-xs text-outline font-semibold">Google Reviews Rating</span>
              </div>
              <div class="h-8 w-px bg-border-subtle"></div>
              <div class="flex flex-col">
                <span class="font-headline-sm text-headline-sm text-primary font-bold">150+ Unit</span>
                <span class="text-xs text-outline">Terkirim di Sumut</span>
              </div>
            </div>
          </div>

          <!-- Customer Handover Showcase Cards (Dynamic from Metronic Admin) -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($testimonials as $testi)
              <div class="bg-surface-card rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col border border-border-subtle group">
                <!-- Handover Delivery Photo -->
                <div class="relative w-full aspect-[4/3] overflow-hidden bg-surface-dark">
                  <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Serah Terima {{ $testi->nama_pelanggan }}" src="{{ $testi->photo_url }}"/>
                  <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-surface-dark/85 backdrop-blur-sm text-ev-cyan font-label-sm text-label-sm font-semibold flex items-center gap-1 border border-ev-cyan/30">
                    <span class="material-symbols-outlined text-[14px]">verified</span>
                    <span>Unit Serah Terima</span>
                  </span>
                </div>
                <!-- Review Content -->
                <div class="p-6 flex flex-col flex-1 justify-between gap-4">
                  <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-1 text-yellow-500">
                      <span class="material-symbols-outlined text-[18px]">star</span>
                      <span class="material-symbols-outlined text-[18px]">star</span>
                      <span class="material-symbols-outlined text-[18px]">star</span>
                      <span class="material-symbols-outlined text-[18px]">star</span>
                      <span class="material-symbols-outlined text-[18px]">star</span>
                    </div>
                    <p class="font-body-sm text-body-sm text-on-surface leading-relaxed italic">
                      "{{ $testi->keterangan }}"
                    </p>
                  </div>
                  <div class="pt-3 border-t border-border-subtle flex items-center justify-between">
                    <div class="flex flex-col">
                      <span class="font-label-md text-label-md text-on-surface font-bold">{{ $testi->nama_pelanggan }}</span>
                      <span class="text-xs text-outline">Konsumen BYD Medan</span>
                    </div>
                    <span class="px-2.5 py-1 rounded-full bg-primary-container/10 text-primary font-label-sm text-xs font-bold">
                      Verified Buyer
                    </span>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-span-full p-8 text-center bg-surface-card rounded-2xl border border-border-subtle text-on-surface-variant">
                Belum ada ulasan testimoni yang ditambahkan.
              </div>
            @endforelse
          </div>

          <!-- Direct Test Drive Banner -->
          <div class="w-full p-8 rounded-2xl bg-gradient-to-r from-surface-dark via-primary to-surface-dark text-surface flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl relative overflow-hidden">
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-ev-cyan/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="flex flex-col gap-2 z-10 text-center md:text-left">
              <span class="font-label-sm text-label-sm text-ev-cyan uppercase tracking-widest font-semibold">Test Drive Gratis Diantar ke Rumah / Kantor</span>
              <h3 class="font-headline-lg text-headline-lg text-surface font-bold">Ingin Mencoba Langsung Mobil Listrik BYD?</h3>
              <p class="font-body-md text-body-md text-surface/80 max-w-xl">
                Jadwalkan test drive eksklusif tanpa ribet. {{ $profile->jabatan_sales ?? 'Sales Supervisor' }} {{ $profile->nama_sales ?? 'Keldy Sietra' }} siap membawa unit uji ke lokasi yang Anda inginkan di Kota Medan.
              </p>
            </div>
            <div class="flex items-center gap-3 shrink-0 z-10">
              <a class="px-6 py-3.5 rounded-xl bg-whatsapp-green hover:brightness-105 text-surface font-label-lg text-label-lg transition-all shadow-lg shadow-whatsapp-green/30 flex items-center gap-2 transform hover:-translate-y-0.5" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya ingin jadwalkan Test Drive Mobil BYD ke lokasi saya') }}" target="_blank">
                <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                <span>Jadwalkan Test Drive Sekarang</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- 7. SHOWROOM INFORMATION & GOOGLE MAPS SECTION -->
      <section id="lokasi" class="w-full py-space-3xl bg-surface-muted scroll-mt-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 flex flex-col gap-8">
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="flex flex-col gap-2">
              <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-[24px]">location_on</span>
                <span class="font-label-lg text-label-lg uppercase tracking-wider text-primary">Lokasi Showroom &amp; Bengkel</span>
              </div>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">Kunjungi BYD Arista Cemara Medan</h2>
              <p class="font-body-md text-body-md text-on-surface-variant">Layanan 3S (Sales, Service, Spare Parts) resmi dan modern di Kota Medan.</p>
            </div>
            <div class="shrink-0">
              <a class="px-5 py-2.5 rounded-xl bg-surface-card hover:bg-surface-container text-primary font-label-md text-label-md transition-colors flex items-center gap-2 shadow-sm border border-border-subtle" href="https://maps.google.com/?q=BYD+Arista+Cemara+Medan" target="_blank">
                <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                <span>Buka Google Maps</span>
              </a>
            </div>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-stretch">
            <!-- Interactive Google Maps View -->
            <div class="lg:col-span-8 rounded-2xl overflow-hidden shadow-sm h-96 lg:h-auto min-h-[380px] relative border border-border-subtle bg-surface-muted">
              {!! $profile->maps_embed_html !!}
              <div class="absolute bottom-4 left-4 p-4 rounded-xl bg-surface-card/95 backdrop-blur-md shadow-md max-w-sm border border-border-subtle pointer-events-none hidden sm:block">
                <div class="flex items-center gap-2 text-primary font-label-md text-label-md font-semibold">
                  <span class="material-symbols-outlined text-[20px]">pin_drop</span>
                  <span>{{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}</span>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                  {{ $profile->alamat ?? 'Jl. Cemara No. 198, Pulo Brayan Bengkel Lor, Kec. Medan Timur, Kota Medan, Sumatera Utara 20239' }}
                </p>
              </div>
            </div>

            <!-- Showroom Contact & Hours -->
            <div class="lg:col-span-4 bg-surface-card p-6 rounded-2xl shadow-sm flex flex-col justify-between gap-6 border border-border-subtle">
              <div class="flex flex-col gap-5">
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Detail Jam Operasional</h3>
                <div class="flex flex-col gap-3">
                  <div class="flex items-start gap-3 p-3 rounded-xl bg-surface-muted">
                    <span class="material-symbols-outlined text-primary text-[20px] mt-0.5">schedule</span>
                    <div class="flex flex-col">
                      <span class="font-label-md text-label-md text-on-surface font-semibold">Showroom Buka Setiap Hari</span>
                      <span class="font-body-sm text-body-sm text-on-surface-variant">{{ $profile->jam_operasional ?? 'Senin - Minggu: 08.30 - 18.00 WIB' }}</span>
                      <span class="font-label-sm text-label-sm text-whatsapp-green mt-1">Hari Libur Tetap Buka</span>
                    </div>
                  </div>
                  <div class="flex items-start gap-3 p-3 rounded-xl bg-surface-muted">
                    <span class="material-symbols-outlined text-primary text-[20px] mt-0.5">home_repair_service</span>
                    <div class="flex flex-col">
                      <span class="font-label-md text-label-md text-on-surface font-semibold">Bengkel Resmi &amp; Fast Charging</span>
                      <span class="font-body-sm text-body-sm text-on-surface-variant">Senin - Sabtu: 08.30 - 16.30 WIB</span>
                      <span class="font-label-sm text-label-sm text-outline mt-1">Fasilitas DC Fast Charger Tersedia</span>
                    </div>
                  </div>
                  <div class="flex items-start gap-3 p-3 rounded-xl bg-surface-muted">
                    <span class="material-symbols-outlined text-primary text-[20px] mt-0.5">person</span>
                    <div class="flex flex-col">
                      <span class="font-label-md text-label-md text-on-surface font-semibold">Kontak Booking Test Drive</span>
                      <span class="font-body-sm text-body-sm text-on-surface-variant">{{ $profile->nama_sales ?? 'Keldy Sietra' }}: {{ $profile->nomor_telepon ?? '0823-6882-7959' }}</span>
                      <span class="font-label-sm text-label-sm text-outline mt-1">Unit Test Drive Bisa Diantar ke Rumah</span>
                    </div>
                  </div>
                </div>
              </div>
              <a class="w-full py-3 px-4 rounded-xl bg-primary-container hover:bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center gap-2 transition-colors shadow-md" href="tel:{{ $profile->nomor_telepon ?? '082368827959' }}">
                <span class="material-symbols-outlined text-[18px]">call</span>
                <span>Telepon Sales ({{ $profile->nomor_telepon ?? '082368827959' }})</span>
              </a>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <!-- FOOTER -->
  <footer class="w-full bg-surface-dark text-surface border-t border-surface-container-highest/20">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 pt-space-2xl pb-space-xl">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter mb-space-2xl">
        <div class="flex flex-col gap-4">
          <div class="flex items-center gap-3">
            <img alt="{{ $profile->nama_produk ?? 'BYD Medan' }} Logo" class="h-7 w-auto object-contain" src="{{ asset('images/byd_auto_logo.png') }}"/>
            <span class="font-headline-sm text-headline-sm text-surface">{{ $profile->nama_produk ?? 'BYD Medan' }}</span>
          </div>
          <p class="font-body-sm text-body-sm text-surface/70 leading-relaxed">
            {{ $profile->keterangan_profil ?? 'Dealer Resmi BYD Arista Cemara Medan melayani penjualan mobil listrik terdepan di Sumatera Utara dengan layanan test drive, garansi baterai Blade, dan pembiayaan terpercaya.' }}
          </p>
          <div class="flex items-center gap-2 pt-2 flex-wrap">
            <a aria-label="WhatsApp" class="w-9 h-9 rounded-xl bg-surface-container-highest/20 hover:bg-whatsapp-green flex items-center justify-center text-surface transition-colors" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}" target="_blank">
              <span class="material-symbols-outlined text-[18px]">chat</span>
            </a>
            <a aria-label="Telepon" class="w-9 h-9 rounded-xl bg-surface-container-highest/20 hover:bg-primary flex items-center justify-center text-surface transition-colors" href="tel:{{ $profile->nomor_telepon ?? '082368827959' }}">
              <span class="material-symbols-outlined text-[18px]">call</span>
            </a>
            <a aria-label="Lokasi" class="w-9 h-9 rounded-xl bg-surface-container-highest/20 hover:bg-primary flex items-center justify-center text-surface transition-colors" href="#lokasi">
              <span class="material-symbols-outlined text-[18px]">near_me</span>
            </a>
            @if(!empty($profile->ig))
              <a aria-label="Instagram" class="w-9 h-9 rounded-xl bg-surface-container-highest/20 hover:bg-pink-600 flex items-center justify-center text-surface transition-colors" href="{{ str_starts_with($profile->ig, 'http') ? $profile->ig : 'https://instagram.com/' . ltrim($profile->ig, '@') }}" target="_blank">
                <span class="material-symbols-outlined text-[18px]">photo_camera</span>
              </a>
            @endif
            @if(!empty($profile->tiktok))
              <a aria-label="TikTok" class="w-9 h-9 rounded-xl bg-surface-container-highest/20 hover:bg-neutral-800 flex items-center justify-center text-surface transition-colors" href="{{ str_starts_with($profile->tiktok, 'http') ? $profile->tiktok : 'https://tiktok.com/@' . ltrim($profile->tiktok, '@') }}" target="_blank">
                <span class="material-symbols-outlined text-[18px]">music_note</span>
              </a>
            @endif
            @if(!empty($profile->treads))
              <a aria-label="Threads" class="w-9 h-9 rounded-xl bg-surface-container-highest/20 hover:bg-slate-700 flex items-center justify-center text-surface transition-colors" href="{{ str_starts_with($profile->treads, 'http') ? $profile->treads : 'https://threads.net/@' . ltrim($profile->treads, '@') }}" target="_blank">
                <span class="material-symbols-outlined text-[18px]">alternate_email</span>
              </a>
            @endif
          </div>
        </div>

        <div class="flex flex-col gap-3">
          <span class="font-headline-sm text-headline-sm text-secondary-fixed-dim uppercase tracking-wider">Alamat Showroom</span>
          <p class="font-body-sm text-body-sm text-surface/80">
            {{ $profile->alamat ?? "BYD Arista Cemara\nJl. Cemara No. 198, Pulo Brayan Bengkel Lor, Kec. Medan Timur, Kota Medan, Sumatera Utara 20239" }}
          </p>
          <div class="flex items-center gap-2 text-surface/70 font-body-sm text-body-sm pt-2">
            <span class="material-symbols-outlined text-[18px] text-ev-cyan">schedule</span>
            <span>{{ $profile->jam_operasional ?? 'Senin - Minggu: 08.30 - 18.00 WIB' }}</span>
          </div>
        </div>

        <div class="flex flex-col gap-3">
          <span class="font-headline-sm text-headline-sm text-secondary-fixed-dim uppercase tracking-wider">Kontak Penjualan</span>
          <div class="bg-surface-container-highest/10 p-4 rounded-xl border border-surface-container-highest/20 flex flex-col gap-2">
            <span class="font-label-lg text-label-lg text-surface font-semibold">{{ $profile->nama_sales ?? 'Keldy Sietra' }}</span>
            <span class="font-label-sm text-label-sm text-secondary-fixed-dim">{{ $profile->jabatan_sales ?? 'Sales Supervisor' }}</span>
            <a class="font-body-sm text-body-sm text-surface hover:text-ev-cyan flex items-center gap-2" href="tel:{{ $profile->nomor_telepon ?? '082368827959' }}">
              <span class="material-symbols-outlined text-[16px]">phone_in_talk</span>
              {{ $profile->nomor_telepon ?? '0823-6882-7959' }}
            </a>
            <a class="font-body-sm text-body-sm text-whatsapp-green hover:underline flex items-center gap-2" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}" target="_blank">
              <span class="material-symbols-outlined text-[16px]">chat</span>
              WhatsApp Langsung
            </a>
          </div>
        </div>

        <div class="flex flex-col gap-3">
          <span class="font-headline-sm text-headline-sm text-secondary-fixed-dim uppercase tracking-wider">Layanan Cepat</span>
          <div class="flex flex-col gap-2 font-body-sm text-body-sm text-surface/80">
            <a class="hover:text-ev-cyan transition-colors" href="#beranda">Beranda &amp; Promo Utama</a>
            <a class="hover:text-ev-cyan transition-colors" href="#katalog-model">Katalog Unit Mobil Listrik BYD</a>
            <a class="hover:text-ev-cyan transition-colors" href="#pricelist">Daftar Harga OTR Medan 2025</a>
            <a class="hover:text-ev-cyan transition-colors" href="#simulasi-kredit">Kalkulator Simulasi Kredit DP Ringan</a>
            <a class="hover:text-ev-cyan transition-colors" href="#testimonial">Ulasan &amp; Serah Terima Konsumen</a>
            <a class="hover:text-ev-cyan transition-colors" href="#lokasi">Lokasi Showroom &amp; Bengkel</a>
            <a class="hover:text-primary transition-colors flex items-center gap-1.5 pt-2 text-surface/50" href="{{ route('login') }}">
              <span class="material-symbols-outlined text-[16px]">admin_panel_settings</span>
              <span>Portal Manajemen Admin</span>
            </a>
          </div>
        </div>
      </div>

      <div class="pt-8 border-t border-surface-container-highest/20 flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="font-body-sm text-body-sm text-surface/60">&copy; {{ date('Y') }} {{ $profile->nama_produk ?? 'BYD Arista Cemara Medan' }}. Hak Cipta Dilindungi Undang-Undang.</p>
        <div class="flex items-center gap-4">
          <p class="font-label-sm text-label-sm text-surface/50">Authorized BYD Passenger Vehicle Dealership - Medan</p>
          <a class="font-label-sm text-label-sm text-surface/50 hover:text-primary transition-colors flex items-center gap-1" href="{{ route('login') }}">
            <span class="material-symbols-outlined text-[14px]">lock</span>
            Admin Login
          </a>
        </div>
      </div>
    </div>

    <!-- Floating Action WhatsApp & Back To Top -->
    <aside class="fixed bottom-6 right-6 z-50 flex items-center gap-3">
      <button id="btnBackToTop" class="hidden opacity-0 transition-opacity duration-300 w-12 h-12 rounded-full bg-surface-dark/90 hover:bg-surface-dark text-surface border border-surface-container-highest/30 shadow-lg flex items-center justify-center focus:outline-none" aria-label="Kembali ke atas">
        <span class="material-symbols-outlined text-[22px]">arrow_upward</span>
      </button>

      <a class="flex items-center gap-3 bg-whatsapp-green hover:brightness-105 text-surface px-5 py-3 rounded-full shadow-[0_8px_20px_-2px_rgba(37,211,102,0.45)] transition-all transform hover:-translate-y-0.5" href="https://wa.me/{{ $profile->whatsapp_number ?? '6282368827959' }}?text={{ urlencode('Halo ' . ($profile->nama_sales ?? 'Sales') . ', saya ingin konsultasi mobil BYD Medan') }}" target="_blank">
        <span class="relative flex h-3 w-3">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
          <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
        </span>
        <span class="font-label-lg text-label-lg font-semibold tracking-wide">Chat Sales {{ $profile->nama_sales ?? 'Keldy' }}</span>
      </a>
    </aside>
  </footer>

  <!-- CLIENT JAVASCRIPT: SMOOTH TRANSITIONS, ANCHOR NAVIGATION, SCROLLSPY, PRICELIST FILTER & CALCULATOR -->
  <script>
    // 1. Precise Smooth Scroll Engine with Fixed Header Offset
    document.addEventListener('DOMContentLoaded', function() {
      const headerOffset = 80; // height of fixed header (5rem = 80px)

      function smoothScrollTo(targetSelector) {
        if (!targetSelector || targetSelector === '#' || targetSelector === '#!') return;
        const targetElement = document.querySelector(targetSelector);
        if (!targetElement) return;

        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });

        // If target is a car card, trigger visual focus pulse
        if (targetElement.classList.contains('car-card')) {
          targetElement.classList.remove('card-focus-highlight');
          void targetElement.offsetWidth; // trigger reflow
          targetElement.classList.add('card-focus-highlight');
          setTimeout(() => {
            targetElement.classList.remove('card-focus-highlight');
          }, 1500);
        }
      }

      // Attach to all anchor links targeting IDs
      document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
          const href = this.getAttribute('href');
          if (href && href.startsWith('#') && href.length > 1) {
            e.preventDefault();
            smoothScrollTo(href);

            // Close mobile menu if open
            closeMobileMenu();

            // Update URL hash without instant jump
            if (history.pushState) {
              history.pushState(null, null, href);
            }
          }
        });
      });

      // 2. Mobile Menu Toggle Controller
      const mobileMenuToggle = document.getElementById('mobileMenuToggle');
      const mobileMenu = document.getElementById('mobileMenu');
      const menuIconOpen = document.getElementById('menuIconOpen');
      const menuIconClose = document.getElementById('menuIconClose');

      function toggleMobileMenu() {
        const isOpen = !mobileMenu.classList.contains('hidden');
        if (isOpen) {
          closeMobileMenu();
        } else {
          openMobileMenu();
        }
      }

      function openMobileMenu() {
        mobileMenu.classList.remove('hidden');
        menuIconOpen.classList.add('hidden');
        menuIconClose.classList.remove('hidden');
      }

      function closeMobileMenu() {
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
          menuIconOpen.classList.remove('hidden');
          menuIconClose.classList.add('hidden');
        }
      }

      if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
      }

      // Mobile Model Accordion
      const mobileModelToggle = document.getElementById('mobileModelToggle');
      const mobileModelList = document.getElementById('mobileModelList');
      const mobileModelArrow = document.getElementById('mobileModelArrow');

      if (mobileModelToggle && mobileModelList) {
        mobileModelToggle.addEventListener('click', function() {
          const isHidden = mobileModelList.classList.contains('hidden');
          if (isHidden) {
            mobileModelList.classList.remove('hidden');
            mobileModelArrow.classList.add('rotate-180');
          } else {
            mobileModelList.classList.add('hidden');
            mobileModelArrow.classList.remove('rotate-180');
          }
        });
      }

      // 3. ScrollSpy for Active Menu Highlighting
      const sections = ['beranda', 'katalog-model', 'pricelist', 'simulasi-kredit', 'testimonial', 'lokasi'];
      const navLinks = document.querySelectorAll('#desktopNav .nav-link');

      function updateActiveNav() {
        const scrollPosition = window.pageYOffset + headerOffset + 60;
        let currentSectionId = 'beranda';

        sections.forEach(id => {
          const el = document.getElementById(id);
          if (el) {
            const top = el.offsetTop;
            const height = el.offsetHeight;
            if (scrollPosition >= top && scrollPosition < top + height) {
              currentSectionId = id;
            }
          }
        });

        navLinks.forEach(link => {
          const linkSection = link.getAttribute('data-section');
          if (linkSection === currentSectionId) {
            link.className = 'nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md bg-primary-container text-on-primary font-bold shadow-sm transition-all duration-300';
          } else {
            link.className = 'nav-link px-3.5 py-2 rounded-xl font-label-md text-label-md text-surface/80 hover:bg-surface-container-high/20 hover:text-surface transition-all duration-300';
          }
        });

        // Floating Back-to-Top Button Visibility
        const btnBackToTop = document.getElementById('btnBackToTop');
        if (btnBackToTop) {
          if (window.pageYOffset > 500) {
            btnBackToTop.classList.remove('hidden');
            setTimeout(() => btnBackToTop.classList.remove('opacity-0'), 10);
          } else {
            btnBackToTop.classList.add('opacity-0');
            setTimeout(() => {
              if (window.pageYOffset <= 500) btnBackToTop.classList.add('hidden');
            }, 300);
          }
        }
      }

      window.addEventListener('scroll', updateActiveNav, { passive: true });
      updateActiveNav();

      // Back to top button click
      const btnBackToTop = document.getElementById('btnBackToTop');
      if (btnBackToTop) {
        btnBackToTop.addEventListener('click', function() {
          window.scrollTo({ top: 0, behavior: 'smooth' });
        });
      }
    });

    // 4. Interactive Pricelist Category Filter
    function filterPricelist(category, btn) {
      const allButtons = document.querySelectorAll('#pricelistFilterGroup .price-filter-btn');
      allButtons.forEach(b => {
        b.className = 'price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-surface-muted text-on-surface hover:bg-surface-container transition-all';
      });
      btn.className = 'price-filter-btn px-4 py-2 rounded-xl text-sm font-semibold bg-primary-container text-on-primary transition-all shadow-sm';

      const items = document.querySelectorAll('#pricelistContainer .price-item');
      items.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    }

    // 5. Loan Calculator Logic
    function formatRupiah(angka) {
      return 'Rp ' + Math.round(angka).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function updateHargaFromPreset(harga) {
      document.getElementById('calcHarga').value = harga;
      hitungSimulasi();
    }

    function setTenor(years, btn) {
      document.getElementById('calcTenor').value = years;
      
      const allBtns = document.querySelectorAll('.tenor-btn');
      allBtns.forEach(b => {
        b.className = 'tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-surface-muted text-on-surface hover:bg-surface-container transition-all';
      });
      btn.className = 'tenor-btn py-2.5 rounded-xl font-label-md text-label-md bg-primary-container text-on-primary font-bold shadow-sm';
      
      hitungSimulasi();
    }

    function pilihModelKredit(modelNama, harga) {
      const select = document.getElementById('calcModelSelect');
      if (select) {
        let matched = false;
        for (let i = 0; i < select.options.length; i++) {
          if (select.options[i].text.toLowerCase().includes(modelNama.toLowerCase())) {
            select.selectedIndex = i;
            matched = true;
            break;
          }
        }
        if (!matched) {
          select.value = harga;
        }
      }
      const inputHarga = document.getElementById('calcHarga');
      if (inputHarga) {
        inputHarga.value = harga;
      }
      hitungSimulasi();

      const simulasiSec = document.getElementById('simulasi-kredit');
      if (simulasiSec) {
        const headerOffset = 80;
        const offsetPosition = simulasiSec.getBoundingClientRect().top + window.pageYOffset - headerOffset;
        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    }

    function hitungSimulasi() {
      const harga = parseFloat(document.getElementById('calcHarga').value) || 0;
      const dpPercent = parseFloat(document.getElementById('calcDpPercent').value) || 20;
      const bungaPercent = parseFloat(document.getElementById('calcBunga').value) || 5.5;
      const tenorTahun = parseInt(document.getElementById('calcTenor').value) || 3;
      const tenorBulan = tenorTahun * 12;

      const totalDp = harga * (dpPercent / 100);
      const pokokPinjaman = harga - totalDp;
      
      const totalBunga = pokokPinjaman * (bungaPercent / 100) * tenorTahun;
      const totalHutang = pokokPinjaman + totalBunga;
      const angsuranPerBulan = totalHutang / tenorBulan;

      // Update DOM
      document.getElementById('resultHargaDisplay').innerText = formatRupiah(harga);
      document.getElementById('resultTotalDp').innerText = formatRupiah(totalDp);
      document.getElementById('resultPokokPinjaman').innerText = formatRupiah(pokokPinjaman);
      document.getElementById('resultAngsuranBulanan').innerText = formatRupiah(angsuranPerBulan);
      document.getElementById('resultTenorDisplay').innerText = `Tenor: ${tenorTahun} Tahun (${tenorBulan} Bulan)`;

      // WhatsApp Message Formatting
      const modelSelect = document.getElementById('calcModelSelect');
      const selectedModelText = modelSelect && modelSelect.selectedIndex >= 0 ? modelSelect.options[modelSelect.selectedIndex].text.split(' - ')[0] : 'BYD';
      const salesName = @json($profile->nama_sales ?? 'Keldy Sietra');
      const waNumber = @json($profile->whatsapp_number ?? '6282368827959');
      const waText = encodeURIComponent(`Halo ${salesName}, saya ingin konsultasi simulasi kredit:\n- Unit: ${selectedModelText}\n- Harga OTR: ${formatRupiah(harga)}\n- DP (${dpPercent}%): ${formatRupiah(totalDp)}\n- Tenor: ${tenorTahun} Tahun\n- Estimasi Cicilan: ${formatRupiah(angsuranPerBulan)}/bln\nMohon dibantu info promo OTR Medan dan prosesnya.`);
      
      const waBtn = document.getElementById('btnSendWaSimulasi');
      if (waBtn) {
        waBtn.href = `https://wa.me/${waNumber}?text=${waText}`;
      }
    }

    // Run initial calculation on page load
    document.addEventListener('DOMContentLoaded', function() {
      hitungSimulasi();
    });
  </script>

</body>
</html>