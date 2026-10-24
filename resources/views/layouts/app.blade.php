<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pemerintah Desa Jalatrang')</title>
    
    <!-- Import Google Font PT Serif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- Framework & Icon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{ asset('jalatrang.png') }}">
    
    <style>
        :root {
            --bg-dark-navy: #070c18;
            --bg-navy-header: #0b1329;
            --bg-sidebar-header: #0f172a;
            --accent-gold: #f59e0b;
            --accent-orange: #f97316;
            --btn-blue: #2563eb;
            --btn-green: #10b981;
        }

        body {
            background-color: #f8fafc;
            font-family: 'PT Serif', Georgia, serif;
            color: #334155;
        }

        .top-info-bar {
            background-color: var(--bg-dark-navy);
            color: #e2e8f0;
            font-size: 0.8rem;
            border-bottom: 1px solid #1e293b;
        }
        .badge-info-terkini {
            background-color: var(--accent-orange);
            color: #ffffff;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.725rem;
            letter-spacing: 0.5px;
        }
        .navbar-desa {
            background-color: var(--bg-dark-navy);
            border-bottom: 1px solid #1e293b;
        }
        .navbar-desa .nav-link {
            color: #cbd5e1 !important;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 12px;
        }
        .navbar-desa .nav-link:hover {
            color: #ffffff !important;
        }
        .btn-orange-active {
            background-color: var(--accent-orange) !important;
            color: #ffffff !important;
            border-radius: 4px;
            font-weight: 600 !important;
        }
        .hero-header {
            background-color: var(--bg-navy-header);
            color: #ffffff;
            padding: 36px 0 48px 0;
        }
        .card-berita-hover {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            background: #ffffff;
        }
        .card-berita-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
        }

        /* Tag Pill Styling dengan Tautan dan Efek Hover */
        .tag-pill {
            background: #eef2f6;
            color: #64748b;
            border-radius: 4px;
            padding: 3px 10px;
            font-size: 0.8rem;
            display: inline-block;
            margin-right: 4px;
            margin-bottom: 4px;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }
        .tag-pill:hover {
            background-color: #2563eb;
            color: #ffffff;
        }

        footer.footer-desa {
            background-color: var(--bg-dark-navy);
            color: #94a3b8;
            font-size: 0.85rem;
            border-top: 1px solid #1e293b;
        }
        footer.footer-desa a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.15s ease;
        }
        footer.footer-desa a:hover {
            color: #ffffff;
        }
        .footer-title {
            color: var(--accent-gold);
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .btn-action-edit {
            background-color: #f59e0b;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.8rem;
            border-radius: 5px;
            padding: 4px 12px;
            border: none;
            text-decoration: none;
        }
        .btn-action-hapus {
            background-color: #ef4444;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.8rem;
            border-radius: 5px;
            padding: 4px 12px;
            border: none;
        }
        .btn-action-baca {
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.8rem;
            border-radius: 5px;
            padding: 4px 16px;
            border: none;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="top-info-bar py-1">
        <div class="container-fluid px-4 d-flex align-items-center">
            <span class="badge-info-terkini me-2 text-nowrap"><i class="bi bi-info-circle-fill me-1"></i> INFO TERKINI</span>
            <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" class="flex-grow-1 me-3 align-self-center small">
                Kini Hadir Perpustakaan Desa Selaras dengan wajah baru dan manajemen yang lebih terorganisir. &nbsp;&nbsp;&bull;&nbsp;&nbsp; 
                Sekarang Anda dapat belanja langsung di Warung Desa yang merupakan Warung Online Masyarakat Desa Jalatrang.
            </marquee>
            <span class="text-nowrap ms-auto small text-slate-400"><i class="bi bi-calendar3 me-1"></i> Sabtu, 3 Oktober 2026</span>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-desa py-3">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center gap-2" href="{{ route('berita.index') }}">
                <img src="{{ asset('jalatrang.png') }}" alt="Logo Desa Jalatrang" style="height: 40px; width: auto;">
                <div>
                    <div class="fw-bold fs-6 text-white text-uppercase" style="letter-spacing: 0.5px; line-height: 1.2;">PEMERINTAH DESA JALATRANG</div>
                    <div class="text-slate-400" style="font-size: 0.65rem; color: #94a3b8;">KECAMATAN CIPAKU KABUPATEN CIAMIS</div>
                </div>
            </a>

            <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-house-door-fill fs-6"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Kependudukan</a></li>
                    <li class="nav-item"><a class="nav-link px-3 btn-orange-active" href="{{ route('berita.index') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Potensi Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">IDM & SDGs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ketahanan Pangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Keuangan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Download</a></li>

                    @auth
                        <li class="nav-item ms-2 dropdown">
                            <a class="nav-link text-white dropdown-toggle d-flex align-items-center gap-1" href="#" id="userDrop" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle text-warning fs-6"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><span class="dropdown-item-text small text-muted">Role: {{ auth()->user()->role ?? 'Admin' }}</span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item ms-2">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-warning text-dark fw-bold px-3 py-1"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @if (session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer-desa pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="{{ asset('jalatrang.png') }}" alt="Logo Desa Jalatrang" style="height: 40px; width: auto;">
                        <div>
                            <strong class="text-white d-block" style="font-size: 0.85rem; line-height: 1.2;">PEMERINTAH DESA</strong>
                            <strong class="text-warning d-block" style="font-size: 0.85rem; line-height: 1.2;">JALATRANG</strong>
                        </div>
                    </div>
                    <p class="mb-1 small">Jalan Raya Cipaku Nomor 181</p>
                    <p class="mb-1 small">Desa Jalatrang, Kecamatan Cipaku</p>
                    <p class="mb-3 small">Kabupaten Ciamis</p>
                    <p class="mb-1 small"><i class="bi bi-telephone-fill me-2"></i>08123456789</p>
                    <p class="mb-3 small"><i class="bi bi-envelope-fill me-2"></i>pemerintahdesajalatrang@gmail.com</p>
                    <a href="#" class="btn btn-sm btn-outline-light px-3 py-1" style="font-size: 0.75rem;"><i class="bi bi-geo-alt-fill me-1"></i> Lihat Peta</a>
                </div>

                <div class="col-md-3">
                    <h6 class="footer-title">MENU</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#">&rsaquo; Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('berita.index') }}">&rsaquo; Berita</a></li>
                        <li class="mb-2"><a href="#">&rsaquo; Struktural</a></li>
                        <li class="mb-2"><a href="#">&rsaquo; APBDes</a></li>
                        <li class="mb-2"><a href="#">&rsaquo; Prestasi</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="footer-title">LINK TERKAIT</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#"><i class="bi bi-box-arrow-up-right me-2"></i>Kemendesa</a></li>
                        <li class="mb-2"><a href="#"><i class="bi bi-box-arrow-up-right me-2"></i>Kab. Ciamis</a></li>
                        <li class="mb-2"><a href="#"><i class="bi bi-box-arrow-up-right me-2"></i>Pemprov Jabar</a></li>
                        <li class="mb-2"><a href="#"><i class="bi bi-shield-lock-fill me-2"></i>Panel Admin</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="footer-title">MEDIA SOSIAL</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#"><i class="bi bi-twitter-x me-2"></i>twitter/x</a></li>
                        <li class="mb-2"><a href="#"><i class="bi bi-facebook text-primary me-2"></i>facebook</a></li>
                        <li class="mb-2"><a href="#"><i class="bi bi-youtube text-danger me-2"></i>youtube</a></li>
                        <li class="mb-2"><a href="#"><i class="bi bi-instagram text-danger me-2"></i>instagram</a></li>
                    </ul>
                </div>
            </div>

            <hr class="border-secondary opacity-25">
            <div class="text-center small mt-3" style="color: #64748b; font-size: 0.8rem;">
                &copy; 2026 Pemerintah Desa Jalatrang, Semua hak dilindungi
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>