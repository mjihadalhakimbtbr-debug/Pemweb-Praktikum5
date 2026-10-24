@extends('layouts.app')

@section('title', 'Berita & Informasi - Desa Jalatrang')

@section('content')
<div class="hero-header mb-4">
    <div class="container">
        <p class="small mb-1" style="font-size: 0.8rem;">
            <a href="#" class="text-warning text-decoration-none">Beranda</a> 
            <span class="text-white opacity-75">/ Berita</span>
        </p>
        <h1 class="fw-bold mb-1" style="font-size: 2rem;">Berita & Informasi</h1>
        <p class="text-slate-400 mb-0 small" style="color: #94a3b8;">Informasi terkini dari Desa Jalatrang</p>
    </div>
</div>

<div class="container">
    <div class="row g-4">
        <!-- Sidebar Kiri -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 mb-4 overflow-hidden">
                <div class="card-header text-white fw-bold py-3" style="background-color: var(--bg-sidebar-header); font-size: 0.9rem;">
                    <i class="bi bi-funnel-fill me-1"></i> Filter Berita
                </div>
                <div class="card-body p-3 bg-white">
                    <form method="GET" action="{{ route('berita.index') }}">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">Kata Kunci</label>
                            <input type="text" name="kata_kunci" class="form-control form-control-sm" value="{{ request('kata_kunci') }}" placeholder="Cari berita...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">Kategori</label>
                            <select name="kategori" class="form-select form-select-sm">
                                <option value="">Semua Kategori</option>
                                @if(isset($kategoris))
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->id }}" @selected(request('kategori') == $k->id)>{{ $k->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div> 
                        <button type="submit" class="btn btn-primary btn-sm w-100 mb-2 fw-semibold" style="background-color: var(--btn-blue);">Cari</button>
                        <a href="{{ route('berita.index') }}" class="btn btn-light border btn-sm w-100 text-secondary">Reset</a>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
                <h6 class="fw-bold small mb-1 text-dark">Kelola Berita</h6>
                <p class="text-muted mb-3" style="font-size: 0.75rem;">Tambahkan artikel atau berita acara terbaru desa.</p>
                <a href="{{ route('berita.create') }}" class="btn btn-success btn-sm w-100 fw-bold py-2" style="background-color: var(--btn-green); border: none;">+ Buat Berita Baru</a>
            </div>
        </div>

        <!-- Daftar Kartu Berita -->
        <div class="col-md-9">
            <div class="row g-4">
                @forelse ($beritas as $berita)
                    <div class="col-md-6">
                        <div class="card card-berita-hover h-100 shadow-sm">
                            <a href="{{ route('berita.show', $berita) }}">
                                @if($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $berita->judul }}">
                                @else
                                    <div class="bg-secondary bg-opacity-25 text-secondary d-flex align-items-center justify-content-center fw-bold fs-4" style="height: 200px;">
                                        600 x 350
                                    </div>
                                @endif
                            </a>

                            <div class="card-body d-flex flex-column p-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge bg-dark px-2 py-1" style="font-size: 0.7rem;">
                                        {{ is_object($berita->kategori) ? $berita->kategori->nama : ($berita->kategori ?? 'Pendidikan') }}
                                    </span>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="bi bi-calendar3 me-1"></i>{{ $berita->created_at ? $berita->created_at->format('d M Y') : '28 Sep 2026' }}
                                    </small>
                                </div>

                                <h6 class="fw-bold text-dark mb-2" style="line-height: 1.4; font-size: 0.95rem;">
                                    <a href="{{ route('berita.show', $berita) }}" class="text-decoration-none text-dark">
                                        {{ Str::limit($berita->judul, 70) }}
                                    </a>
                                </h6>

                                <p class="text-secondary flex-grow-1 mb-3" style="font-size: 0.8rem; line-height: 1.5;">
                                    {{ Str::limit(strip_tags($berita->isi), 110) }}
                                </p>

                                <!-- Tagar Dinamis Terhubung dengan Tautan Filter -->
                                <div class="mb-2">
                                    @if(isset($berita->tags) && count($berita->tags) > 0)
                                        @foreach ($berita->tags as $tag)
                                            <a href="{{ route('berita.index', ['tag' => $tag->id]) }}" class="tag-pill">
                                                #{{ $tag->nama }}
                                            </a>
                                        @endforeach
                                    @else
                                        <span class="text-muted" style="font-size: 0.75rem;">Tanpa tagar</span>
                                    @endif
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="pt-2 border-top d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('berita.edit', $berita) }}" class="btn-action-edit">Edit</a>
                                        <form action="{{ route('berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action-hapus">Hapus</button>
                                        </form>
                                    </div>
                                    <a href="{{ route('berita.show', $berita) }}" class="btn-action-baca ms-auto">Baca &rarr;</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5">
                            <i class="bi bi-newspaper fs-1 text-muted"></i>
                            <p class="text-muted mt-2">Belum ada berita yang diterbitkan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if(method_exists($beritas, 'links'))
                <div class="mt-4">
                    {{ $beritas->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection