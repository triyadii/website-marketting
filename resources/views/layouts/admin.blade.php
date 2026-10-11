<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>@yield('title', 'Admin Dashboard') - BYD Medan Admin Portal</title>

  <!-- Google Fonts: Inter & Space Grotesk -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            // Metronic Signature Dark Sidebar & Accents
            'kt-aside': '#1e1e2d',
            'kt-aside-hover': '#1b1b28',
            'kt-aside-active': '#009EF7',
            'kt-primary': '#009EF7',
            'kt-primary-active': '#0095E8',
            'kt-primary-light': '#F1FAFF',
            'kt-success': '#50CD89',
            'kt-success-light': '#E8FFF3',
            'kt-danger': '#F1416C',
            'kt-danger-light': '#FFF5F8',
            'kt-warning': '#FFC700',
            'kt-warning-light': '#FFF8DD',
            'kt-info': '#7239EA',
            'kt-info-light': '#F8F5FF',
            'kt-dark': '#181C32',
            'kt-muted': '#A1A5B7',
            'kt-gray-100': '#F9F9F9',
            'kt-gray-200': '#F4F6FA',
            'kt-gray-300': '#E4E6EF',
            'kt-gray-400': '#B5B5C3',
            'kt-gray-500': '#7E8299',
            'kt-card-bg': '#FFFFFF',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            heading: ['Space Grotesk', 'sans-serif'],
          }
        }
      }
    };
  </script>

  <style>
    /* Metronic Scrollbar */
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #009EF7; }
  </style>
</head>
<body class="bg-kt-gray-200 font-sans text-kt-dark antialiased">

  <div class="flex h-screen overflow-hidden">

    <!-- METRONIC ASIDE SIDEBAR -->
    <aside id="ktSidebar" class="w-64 bg-kt-aside flex flex-col shrink-0 z-30 transition-all duration-300 fixed inset-y-0 left-0 lg:static -translate-x-full lg:translate-x-0 shadow-xl lg:shadow-none">
      
      <!-- Brand Logo -->
      <div class="h-16 px-6 flex items-center justify-between border-b border-white/5 bg-kt-aside-hover/50">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center group">
          <img class="h-8 w-auto object-contain transition-transform group-hover:scale-105" src="https://lh3.googleusercontent.com/aida/AEtjO1WXG4FMNpx7c_WZbrcRjgigiGAwN-CygLz3yAsg2ExO5kejaUGYZk1q46duib3-ttjdbcK-xmjeO14Ur40V03GdWdkn-3bjiqbP9dEvdq7sDOHlpGlfDxyuDKevlVikd04v0cdbu5lCuQM1fCTkDIUW9WPg7mId0yjsGsWavy8MbfAUnOGPxdpDpym-EyyXpIE8NIguJvl9-THXgwcotHGOxfufm96D5F0XhIengJsFtAQ88BXqqVxDAk3U" alt="BYD"/>
        </a>
        <button id="closeSidebarMobile" class="lg:hidden text-white/70 hover:text-white">
          <span class="material-symbols-outlined text-[20px]">close</span>
        </button>
      </div>

      <!-- Navigation Menu -->
      <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
        
        <!-- Section: Utilitas Utama -->
        <div class="px-3 pb-2 text-[11px] font-semibold text-white/40 uppercase tracking-wider">
          Menu Utama
        </div>

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-kt-primary text-white shadow-md shadow-kt-primary/20 font-semibold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
          <span class="material-symbols-outlined text-[20px]">dashboard</span>
          <span>Dashboard</span>
        </a>

        <!-- Section: Manajemen Data -->
        <div class="px-3 pt-6 pb-2 text-[11px] font-semibold text-white/40 uppercase tracking-wider">
          Pengelolaan Konten
        </div>

        <!-- Manajemen Profil (Update Saja) -->
        <a href="{{ route('admin.profile.index') }}" 
           class="flex items-center justify-between px-3.5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.profile.*') ? 'bg-kt-primary text-white shadow-md shadow-kt-primary/20 font-semibold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">storefront</span>
            <span>Profil Showroom</span>
          </div>
          <span class="text-[10px] px-2 py-0.5 rounded-full {{ request()->routeIs('admin.profile.*') ? 'bg-white/20 text-white' : 'bg-white/10 text-white/60' }}">1 Profil</span>
        </a>

        <!-- Manajemen Katalog -->
        <a href="{{ route('admin.catalogs.index') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.catalogs.*') ? 'bg-kt-primary text-white shadow-md shadow-kt-primary/20 font-semibold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
          <span class="material-symbols-outlined text-[20px]">directions_car</span>
          <span>Katalog Produk</span>
        </a>

        <!-- Manajemen Testimoni -->
        <a href="{{ route('admin.testimonials.index') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.testimonials.*') ? 'bg-kt-primary text-white shadow-md shadow-kt-primary/20 font-semibold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
          <span class="material-symbols-outlined text-[20px]">reviews</span>
          <span>Testimoni Konsumen</span>
        </a>

        <!-- Section: Hak Akses & Akun -->
        <div class="px-3 pt-6 pb-2 text-[11px] font-semibold text-white/40 uppercase tracking-wider">
          Pengaturan Sistem
        </div>

        <!-- Manajemen Akun -->
        <a href="{{ route('admin.accounts.index') }}" 
           class="flex items-center gap-3 px-3.5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.accounts.*') ? 'bg-kt-primary text-white shadow-md shadow-kt-primary/20 font-semibold' : 'text-white/70 hover:bg-white/5 hover:text-white' }}">
          <span class="material-symbols-outlined text-[20px]">manage_accounts</span>
          <span>Manajemen Akun</span>
        </a>

        <!-- Public Preview -->
        <a href="{{ route('home') }}" target="_blank"
           class="flex items-center justify-between px-3.5 py-3 rounded-xl text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white transition-all mt-4 border border-white/5">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">open_in_new</span>
            <span>Buka Website</span>
          </div>
          <span class="text-[10px] text-kt-success bg-kt-success/10 px-2 py-0.5 rounded-full font-semibold">Live</span>
        </a>
      </div>

      <!-- User Info & Logout Footer in Sidebar -->
      <div class="p-4 border-t border-white/5 bg-kt-aside-hover/60">
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3 min-w-0">
            <div class="w-9 h-9 rounded-xl bg-kt-primary/20 text-kt-primary flex items-center justify-center font-bold text-sm shrink-0">
              {{ strtoupper(substr(Auth::user()->username ?? 'A', 0, 1)) }}
            </div>
            <div class="flex flex-col min-w-0">
              <span class="text-sm font-semibold text-white truncate">{{ Auth::user()->name ?: Auth::user()->username }}</span>
              <span class="text-xs text-kt-muted truncate">@ {{ Auth::user()->username }}</span>
            </div>
          </div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" title="Keluar / Logout" class="text-white/50 hover:text-kt-danger transition-colors p-1.5 rounded-lg hover:bg-white/5">
              <span class="material-symbols-outlined text-[20px]">logout</span>
            </button>
          </form>
        </div>
      </div>
    </aside>

    <!-- MAIN BODY CONTENT -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
      
      <!-- TOP NAVBAR -->
      <header class="h-16 bg-white border-b border-kt-gray-300/70 px-6 lg:px-8 flex items-center justify-between shrink-0 sticky top-0 z-20 shadow-sm">
        <div class="flex items-center gap-4">
          <!-- Mobile Sidebar Toggle -->
          <button id="openSidebarMobile" class="lg:hidden text-kt-gray-500 hover:text-kt-dark focus:outline-none">
            <span class="material-symbols-outlined text-[24px]">menu</span>
          </button>
          <div class="flex flex-col">
            <h1 class="text-base font-bold text-kt-dark">@yield('page_title', 'Dashboard')</h1>
            <div class="text-xs text-kt-muted flex items-center gap-1.5">
              <a href="{{ route('admin.dashboard') }}" class="hover:text-kt-primary transition-colors">Admin</a>
              <span>/</span>
              <span>@yield('breadcrumb', 'Dashboard')</span>
            </div>
          </div>
        </div>

        <div class="flex items-center gap-3">
          <!-- Status Pill -->
          <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-kt-success-light text-kt-success border border-kt-success/20">
            <span class="w-1.5 h-1.5 rounded-full bg-kt-success animate-ping"></span>
            <span>Online</span>
          </span>

          <!-- Logout Button -->
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-2 px-3 py-1.5 rounded-xl text-xs font-semibold text-kt-gray-500 hover:text-kt-danger hover:bg-kt-danger-light transition-all border border-kt-gray-300/80">
              <span class="material-symbols-outlined text-[16px]">logout</span>
              <span class="hidden md:inline">Keluar</span>
            </button>
          </form>
        </div>
      </header>

      <!-- MAIN PAGE CONTENT -->
      <main class="flex-1 p-6 lg:p-8 max-w-7xl w-full mx-auto">
        
        <!-- FLASH MESSAGES -->
        @if (session('success'))
          <div class="mb-6 p-4 rounded-2xl bg-kt-success-light border border-kt-success/20 text-kt-success flex items-center gap-3 shadow-sm">
            <span class="material-symbols-outlined text-[22px] shrink-0">check_circle</span>
            <div class="flex-1 text-sm font-medium">{{ session('success') }}</div>
            <button onclick="this.parentElement.remove()" class="text-kt-success/70 hover:text-kt-success">
              <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
          </div>
        @endif

        @if (session('error'))
          <div class="mb-6 p-4 rounded-2xl bg-kt-danger-light border border-kt-danger/20 text-kt-danger flex items-center gap-3 shadow-sm">
            <span class="material-symbols-outlined text-[22px] shrink-0">error</span>
            <div class="flex-1 text-sm font-medium">{{ session('error') }}</div>
            <button onclick="this.parentElement.remove()" class="text-kt-danger/70 hover:text-kt-danger">
              <span class="material-symbols-outlined text-[18px]">close</span>
            </button>
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-6 p-4 rounded-2xl bg-kt-danger-light border border-kt-danger/20 text-kt-danger shadow-sm">
            <div class="flex items-center gap-2 font-semibold text-sm mb-1">
              <span class="material-symbols-outlined text-[20px]">warning</span>
              <span>Terjadi beberapa kendala pada input Anda:</span>
            </div>
            <ul class="list-disc list-inside text-xs space-y-1 pl-6">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @yield('content')
      </main>

      <!-- FOOTER -->
      <footer class="h-12 border-t border-kt-gray-300/60 bg-white px-6 lg:px-8 flex items-center justify-between text-xs text-kt-muted shrink-0">
        <div>&copy; 2025 BYD Arista Cemara Medan. Metronic Admin Framework.</div>
        <div class="flex items-center gap-3">
          <a href="{{ route('sitemap') }}" target="_blank" class="hover:text-kt-primary transition-colors">Sitemap XML</a>
          <span>&bull;</span>
          <a href="{{ route('home') }}" target="_blank" class="hover:text-kt-primary transition-colors">Lihat Web</a>
        </div>
      </footer>
    </div>
  </div>

  <!-- SCRIPT FOR MOBILE SIDEBAR -->
  <script>
    const ktSidebar = document.getElementById('ktSidebar');
    const openSidebarMobile = document.getElementById('openSidebarMobile');
    const closeSidebarMobile = document.getElementById('closeSidebarMobile');

    if (openSidebarMobile && ktSidebar) {
      openSidebarMobile.addEventListener('click', () => {
        ktSidebar.classList.remove('-translate-x-full');
      });
    }

    if (closeSidebarMobile && ktSidebar) {
      closeSidebarMobile.addEventListener('click', () => {
        ktSidebar.classList.add('-translate-x-full');
      });
    }
  </script>
</body>
</html>
