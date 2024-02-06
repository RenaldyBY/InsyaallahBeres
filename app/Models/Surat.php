<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Surat extends Model
{
    use HasFactory;

    public function detailSurat(): HasMany
    {
        return $this->hasMany(DetailSurat::class, 'surat_id');
    }
}
