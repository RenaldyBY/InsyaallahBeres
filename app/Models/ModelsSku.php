<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\status;
use App\Models\User;
class ModelsSku extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "surat_sku";
    protected $fillable = [
        'nomor_surat',
        'name_lengkap' ,
        'tempat_lahir' ,
        'tanggal_lahir',
        'pendidikan' ,
        'alamat' ,
        'rt' ,
        'rw' ,
        'bidang_usaha',
        'lama_usaha',
        'alamat_usaha',
        'tujuan' ,
        'id_user',
        'id_status',
        'nomor_urut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function status()
    {
        return $this->belongsTo(status::class, 'id_status');
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
