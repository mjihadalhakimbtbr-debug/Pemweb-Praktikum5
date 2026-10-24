<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Berita extends Model
{
    protected $fillable = ['judul', 'kategori_id', 'gambar', 'isi', 'user_id'];

    // Relasi Many to One: Berita milik satu kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi Many to One: Berita milik satu user (penulis)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many to Many: Berita memiliki banyak tag
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}