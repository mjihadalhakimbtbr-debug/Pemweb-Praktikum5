@extends('layouts.app')

@section('title', 'Edit Berita - Desa Jalatrang')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header text-white p-3" style="background-color: var(--bg-sidebar-header);">
                    <h5 class="card-title mb-0 fs-6 fw-bold">
                        <i class="bi bi-pencil-square me-2 text-warning"></i> Edit Data Berita
                    </h5>
                </div>
                <div class="card-body p-4 bg-white">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0 ps-3 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="judul" class="form-label small fw-bold text-secondary">Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
                            @error('judul') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori_id" class="form-label small fw-bold text-secondary">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id }}" @selected(old('kategori_id', $berita->kategori_id) == $k->id)>{{ $k->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label small fw-bold text-secondary">Gambar Sampul</label>
                            @if ($berita->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-thumbnail" style="max-height: 150px;" alt="Pratinjau">
                                </div>
                            @endif
                            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            @error('gambar') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary d-block">Pilih Tagar</label>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}" 
                                           @checked(in_array($tag->id, old('tags', $berita->tags->pluck('id')->toArray())))>
                                    <label class="form-check-label small" for="tag{{ $tag->id }}">#{{ $tag->nama }}</label>
                                </div>
                            @endforeach
                            @error('tags') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label small fw-bold text-secondary">Isi Berita</label>
                            <textarea name="isi" id="isi" rows="8" class="form-control" required>{{ old('isi', $berita->isi) }}</textarea>
                            @error('isi') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2 pt-3 border-top">
                            <button type="submit" class="btn btn-primary px-4 fw-bold" style="background-color: var(--btn-blue);">Perbarui Berita</button>
                            <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection