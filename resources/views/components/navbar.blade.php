@props(['transparent' => false, 'active' => null])

@php
    $hrefBeranda = $active === null ? '#beranda' : '/#beranda';
@endphp
<style>
    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -4px;
        height: 2px;
        width: 0%;
        background: var(--gold-light);
        transition: width .25s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-link.is-active {
        color: var(--gold-light);
        font-weight: 600;
    }

    .nav-link.is-active::after {
        width: 100%;
    }

    .mobile-link.is-active {
        color: var(--gold-light);
        background: rgba(255, 255, 255, 0.08);
    }

    #navbar {
        transition: background-color .3s ease, box-shadow .3s ease;
    }

    /* State 1: transparan (hanya di hero) */
    #navbar.state-transparent {
        background-color: transparent;
        background-image: none;
        box-shadow: none;
    }

    /* State 2: hijau solid (sudah lewat hero) */
    #navbar.state-solid {
        background-color: var(--forest);
        background-image: none;
    }

    /* State 3: hijau gradasi (menu mobile terbuka) */
    #navbar.state-menu-open {
        background-color: var(--forest);
        background-image: linear-gradient(135deg, var(--forest) 0%, #0f3d2e 100%);
    }
</style>

<header id="navbar"
    class="fixed top-0 inset-x-0 z-50 transition-all duration-300 {{ $transparent ? 'state-transparent' : 'state-solid shadow-lg' }}">
    <div class="max-w-7xl mx-auto px-5 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="/" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Sukosongo" class="w-7 h-8 object-cover" />
                <div class="leading-tight">
                    <p class="font-display text-white text-base font-semibold">Desa Sukosongo</p>
                    <p class="text-[11px] text-white/60 tracking-wide uppercase">Lamongan &middot; Jawa Timur</p>
                </div>
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-white/85">
                <a href="{{ $hrefBeranda }}"
                    class="nav-link {{ $active === 'beranda' ? 'is-active' : '' }}">Beranda</a>
                <a href="/profil-desa" class="nav-link {{ $active === 'profil-desa' ? 'is-active' : '' }}">Profil
                    Desa</a>
                <a href="/berita" class="nav-link {{ $active === 'berita' ? 'is-active' : '' }}">Berita</a>
                <a href="/umkm" class="nav-link {{ $active === 'umkm' ? 'is-active' : '' }}">UMKM</a>
                <a href="#kontak" class="nav-link">Kontak</a>
            </nav>

            <button id="menuBtn" aria-label="Buka menu" class="lg:hidden text-white p-2 -mr-2">
                <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div id="mobileMenu" class="lg:hidden max-h-0 overflow-hidden">
            <nav class="flex flex-col gap-1 pb-5 text-white/90 text-sm font-medium">
                <a href="{{ $hrefBeranda }}"
                    class="mobile-link px-2 py-2.5 rounded-md {{ $active === 'beranda' ? 'is-active' : 'hover:bg-white/10' }}">Beranda</a>
                <a href="/profil-desa"
                    class="mobile-link px-2 py-2.5 rounded-md {{ $active === 'profil-desa' ? 'is-active' : 'hover:bg-white/10' }}">Profil
                    Desa</a>
                <a href="/berita"
                    class="mobile-link px-2 py-2.5 rounded-md {{ $active === 'berita' ? 'is-active' : 'hover:bg-white/10' }}">Berita</a>
                <a href="/umkm"
                    class="mobile-link px-2 py-2.5 rounded-md {{ $active === 'umkm' ? 'is-active' : 'hover:bg-white/10' }}">UMKM</a>
                <a href="#kontak" class="mobile-link px-2 py-2.5 rounded-md hover:bg-white/10">Kontak</a>
            </nav>
        </div>
    </div>
</header>

<script>
    (function() {
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('iconOpen');
        const iconClose = document.getElementById('iconClose');
        const navbar = document.getElementById('navbar');

        let menuOpen = false;
        let pastHero = {{ $transparent ? 'false' : 'true' }};

        function applyNavbarState() {
            navbar.classList.remove('state-transparent', 'state-solid', 'state-menu-open', 'shadow-lg');

            if (menuOpen) {
                navbar.classList.add('state-menu-open');
                return;
            }

            @if ($transparent)
                if (pastHero) {
                    navbar.classList.add('state-solid', 'shadow-lg');
                } else {
                    navbar.classList.add('state-transparent');
                }
            @else
                navbar.classList.add('state-solid', 'shadow-lg');
            @endif
        }

        menuBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.style.maxHeight = menuOpen ? mobileMenu.scrollHeight + 'px' : '0px';
            iconOpen.classList.toggle('hidden', menuOpen);
            iconClose.classList.toggle('hidden', !menuOpen);
            applyNavbarState();
        });

        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                menuOpen = false;
                mobileMenu.style.maxHeight = '0px';
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                applyNavbarState();
            });
        });

        @if ($transparent)
            function updateScrollState() {
                const heroSection = document.getElementById('beranda') || document.querySelector('section');
                if (!heroSection) {
                    // hero belum ke-render, anggap masih di atas → tetap transparan
                    pastHero = false;
                } else {
                    const heroBottom = heroSection.getBoundingClientRect().bottom;
                    pastHero = heroBottom <= 80; // 80 = perkiraan tinggi navbar
                }
                if (!menuOpen) applyNavbarState();
            }

            window.addEventListener('scroll', updateScrollState);
            window.addEventListener('load', updateScrollState);
            document.addEventListener('DOMContentLoaded', updateScrollState);
        @endif

        applyNavbarState();
    })();
</script>
