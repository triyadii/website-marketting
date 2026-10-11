<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Login Administrator - BYD Arista Cemara Medan</title>

  <!-- Google Fonts: Inter & Space Grotesk -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'kt-aside': '#1e1e2d',
            'kt-primary': '#009EF7',
            'kt-primary-active': '#0095E8',
            'kt-success': '#50CD89',
            'kt-danger': '#F1416C',
            'kt-danger-light': '#FFF5F8',
            'kt-dark': '#181C32',
            'kt-muted': '#A1A5B7',
            'kt-gray-200': '#F5F8FA',
            'kt-gray-300': '#E4E6EF',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            heading: ['Space Grotesk', 'sans-serif'],
          }
        }
      }
    };
  </script>
</head>
<body class="bg-[#1e1e2d] font-sans antialiased text-kt-dark min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
  
  <!-- Atmospheric decorative lighting -->
  <div class="absolute -top-40 -left-40 w-96 h-96 bg-kt-primary/20 rounded-full blur-[140px] pointer-events-none"></div>
  <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-[#00E5FF]/20 rounded-full blur-[140px] pointer-events-none"></div>

  <!-- Login Card (Metronic Aesthetic) -->
  <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8 sm:p-10 relative z-10 border border-white/20">
    
    <!-- Logo & Header -->
    <div class="flex flex-col items-center text-center mb-8">
      <div class="w-16 h-16 rounded-2xl bg-[#0B131F] flex items-center justify-center shadow-lg mb-4 p-2.5">
        <img class="w-full h-auto object-contain" src="https://lh3.googleusercontent.com/aida/AEtjO1WXG4FMNpx7c_WZbrcRjgigiGAwN-CygLz3yAsg2ExO5kejaUGYZk1q46duib3-ttjdbcK-xmjeO14Ur40V03GdWdkn-3bjiqbP9dEvdq7sDOHlpGlfDxyuDKevlVikd04v0cdbu5lCuQM1fCTkDIUW9WPg7mId0yjsGsWavy8MbfAUnOGPxdpDpym-EyyXpIE8NIguJvl9-THXgwcotHGOxfufm96D5F0XhIengJsFtAQ88BXqqVxDAk3U" alt="BYD Logo"/>
      </div>
      <h1 class="text-2xl font-bold font-heading text-kt-dark tracking-tight">Portal Manajemen</h1>
      <p class="text-xs text-kt-muted mt-1">BYD Arista Cemara Medan &bull; Official Dealer</p>
    </div>

    <!-- Alert Success / Error -->
    @if (session('success'))
      <div class="mb-5 p-3.5 rounded-xl bg-green-50 border border-green-200 text-green-700 text-xs font-medium flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px]">check_circle</span>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    @if ($errors->any())
      <div class="mb-5 p-3.5 rounded-xl bg-kt-danger-light border border-kt-danger/20 text-kt-danger text-xs font-medium flex items-center gap-2">
        <span class="material-symbols-outlined text-[18px]">error</span>
        <span>{{ $errors->first() }}</span>
      </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Username Input -->
      <div>
        <label for="username" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark mb-1.5">Username</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-kt-muted">
            <span class="material-symbols-outlined text-[18px]">person</span>
          </span>
          <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                 placeholder="Masukkan username"
                 class="w-full pl-10 pr-4 py-3 rounded-xl border border-kt-gray-300 bg-kt-gray-200/50 text-sm text-kt-dark placeholder-kt-muted focus:bg-white focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
        </div>
      </div>

      <!-- Password Input -->
      <div>
        <div class="flex items-center justify-between mb-1.5">
          <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-kt-dark">Password</label>
        </div>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-kt-muted">
            <span class="material-symbols-outlined text-[18px]">lock</span>
          </span>
          <input type="password" id="password" name="password" required
                 placeholder="Masukkan password"
                 class="w-full pl-10 pr-11 py-3 rounded-xl border border-kt-gray-300 bg-kt-gray-200/50 text-sm text-kt-dark placeholder-kt-muted focus:bg-white focus:border-kt-primary focus:ring-2 focus:ring-kt-primary/20 focus:outline-none transition-all"/>
          <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-kt-muted hover:text-kt-dark">
            <span id="eyeIcon" class="material-symbols-outlined text-[18px]">visibility</span>
          </button>
        </div>
      </div>

      <!-- Remember Me -->
      <div class="flex items-center justify-between text-xs">
        <label class="flex items-center gap-2 cursor-pointer select-none">
          <input type="checkbox" name="remember" class="w-4 h-4 rounded text-kt-primary border-kt-gray-300 focus:ring-kt-primary/20"/>
          <span class="text-kt-muted">Ingat Saya</span>
        </label>
        <span class="text-[11px] text-kt-muted">Akses Khusus Admin</span>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-kt-primary hover:bg-kt-primary-active text-white font-semibold text-sm shadow-lg shadow-kt-primary/25 hover:shadow-kt-primary/40 transition-all flex items-center justify-center gap-2 transform hover:-translate-y-0.5">
        <span>Masuk ke Dashboard</span>
        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
      </button>
    </form>

    <!-- Footer Back Link -->
    <div class="text-center mt-8 pt-5 border-t border-kt-gray-300/60">
      <a href="{{ route('home') }}" class="text-xs font-medium text-kt-muted hover:text-kt-primary transition-colors inline-flex items-center gap-1">
        <span class="material-symbols-outlined text-[14px]">arrow_back</span>
        <span>Kembali ke Halaman Utama</span>
      </a>
    </div>
  </div>

  <script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const eyeIcon = document.getElementById('eyeIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.textContent = 'visibility_off';
      } else {
        passwordInput.type = 'password';
        eyeIcon.textContent = 'visibility';
      }
    }
  </script>
</body>
</html>
