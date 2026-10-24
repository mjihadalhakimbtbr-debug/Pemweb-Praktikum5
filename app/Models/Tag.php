<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['nama'];

    // Relasi Many to Many: Satu tag dimiliki oleh banyak berita
    public function beritas(): BelongsToMany
    {
        return $this->belongsToMany(Berita::class);
    }
}