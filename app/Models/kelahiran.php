<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\status;
use App\Models\User;
class kelahiran extends Model
{
    use HasFactory;
    protected $table = "surat_kelahiran";
    protected $fillable = [
        'nomor_surat',
        'nama_anak' ,
        'jenis_kelamin',
        'anak_ke',
        'nama_ibu',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_pelapor',
        'nik_pelapor',
        'hubungan',
        'tempat_lahir' ,
        'tanggal_lahir',
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
