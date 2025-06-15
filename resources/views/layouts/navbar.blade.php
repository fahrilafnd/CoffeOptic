<nav class="bg-[#2b2323] text-white fixed top-0 left-0 w-full z-50 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 text-xl font-bold text-[#a77b4c]">
                CoffeOptic
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center">
                <button id="menu-btn" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Menu (desktop) -->
            <div class="hidden lg:flex lg:space-x-6 items-center">
                <a href="{{ url('/homepage') }}"
                   class="{{ request()->is('homepage') ? 'text-[#a77b4c] font-semibold' : 'hover:text-[#a77b4c]' }} transition">
                    Beranda
                </a>
            
                <a href="{{ url('/panduan') }}"
                   class="{{ request()->is('panduan') ? 'text-[#a77b4c] font-semibold' : 'hover:text-[#a77b4c]' }} transition">
                    Panduan
                </a>
            
                <a href="{{ url('/hasil-laporan') }}"
                    class="{{ request()->is('hasil-laporan') ? 'text-[#a77b4c] font-semibold' : 'hover:text-[#a77b4c]' }} transition">
                    Hasil Laporan
                </a>

            
                <button type="button"
                        onclick="confirmLogout()"
                        class="bg-[#a77b4c] hover:bg-[#8c6540] text-white font-medium px-4 py-2 rounded transition">
                    Logout
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden px-4 pt-2 pb-4 space-y-2 bg-[#2b2323]">
        <a href="{{ url('/homepage') }}"
           class="block {{ request()->is('homepage') ? 'text-[#a77b4c] font-semibold' : 'hover:text-[#a77b4c]' }} transition">
            Home
        </a>
    
        <a href="{{ url('/panduan') }}"
           class="block {{ request()->is('panduan') ? 'text-[#a77b4c] font-semibold' : 'hover:text-[#a77b4c]' }} transition">
            Panduan
        </a>
    
        <a href="{{ url('/hasil-laporan') }}"
           class="block {{ request()->is('hasil-laporan') ? 'text-[#a77b4c] font-semibold' : 'hover:text-[#a77b4c]' }} transition">
            Hasil Penyortiran
        </a>
    
        <button type="button"
                onclick="confirmLogout()"
                class="w-full text-left bg-[#a77b4c] hover:bg-[#8c6540] text-white font-medium px-4 py-2 rounded transition">
            Logout
        </button>
    </div>
</nav>

<!-- Hidden logout form -->
<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
    @csrf
</form>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn?.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Sesi Anda akan berakhir.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#a77b4c',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>
