@extends('layouts.app')

@section('title', $berita->judul . ' - Desa Jalatrang')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
                
                <!-- Badge Kategori & Tanggal -->
                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="badge bg-dark px-3 py-2 fs-6">
                        {{ is_object($berita->kategori) ? $berita->kategori->nama : ($berita->kategori ?? 'Umum') }}
                    </span>
                    <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at ? $berita->created_at->format('d M Y') : '28 Sep 2026' }}</small>
                </div>

                <!-- Judul Artikel -->
                <h2 class="fw-bold text-dark mb-4" style="line-height: 1.3;">
                    {{ $berita->judul }}
                </h2>

                <!-- Gambar Utama -->
                <div class="mb-4 text-center">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid rounded-3 w-100" style="max-height: 480px; object-fit: cover;" alt="{{ $berita->judul }}">
                    @else
                        <div class="bg-secondary bg-opacity-10 text-secondary d-flex align-items-center justify-content-center fw-bold fs-3 rounded-3" style="height: 350px;">
                            600 x 350
                        </div>
                    @endif
                </div>

                <!-- Isi Artikel -->
                <div class="article-body text-secondary fs-6 mb-4" style="line-height: 1.8; text-align: justify;">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <!-- Navigasi Kembali -->
                <div class="pt-3 border-top">
                    <a href="{{ route('berita.index') }}" class="text-decoration-none fw-bold text-primary">
                        &larr; Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection