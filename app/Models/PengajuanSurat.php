<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_surat';
    protected $keyType = 'string';
    protected $guarded = [];

    public function surat(): BelongsTo
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }

    public function pengajuanSuratDetail(): HasMany
    {
        return $this->hasMany(PengajuanSuratDetail::class, 'no_surat');
    }
}
