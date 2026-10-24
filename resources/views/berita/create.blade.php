@extends('layouts.app')

@section('title', 'Tambah Berita Baru - Desa Jalatrang')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header text-white p-3" style="background-color: var(--bg-sidebar-header);">
                    <h5 class="card-title mb-0 fs-6 fw-bold">
                        <i class="bi bi-plus-circle-fill me-2 text-warning"></i> Tambah Berita Baru
                    </h5>
                </div>
                <div class="card-body p-4 bg-white">

                    <!-- Menampilkan ringkasan error validasi jika ada -->
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0 ps-3 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label small fw-bold text-secondary">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Judul artikel berita..." required>
                            @error('judul') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Kategori dinamis dari database -->
                        <div class="mb-3">
                            <label for="kategori_id" class="form-label small fw-bold text-secondary">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}" @selected(old('kategori_id') == $k->id)>{{ $k->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label small fw-bold text-secondary">Gambar Sampul</label>
                            <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, WEBP (Maksimal 2MB)</small>
                            @error('gambar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Pilihan Tagar -->
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary d-block">Pilih Tagar</label>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags', [])))>
                                    <label class="form-check-label small" for="tag{{ $tag->id }}">#{{ $tag->nama }}</label>
                                </div>
                            @endforeach
                            @error('tags') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label small fw-bold text-secondary">Isi Berita</label>
                            <textarea name="isi" id="isi" rows="8" class="form-control @error('isi') is-invalid @enderror" placeholder="Tuliskan isi berita selengkapnya..." required>{{ old('isi') }}</textarea>
                            @error('isi') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2 pt-3 border-top">
                            <button type="submit" class="btn btn-primary px-4 fw-bold" style="background-color: var(--btn-blue);">Simpan Berita</button>
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection