<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\status;
use App\Models\User;
class domisili extends Model
{
    use HasFactory;
    protected $table = "surat_domisili";
    protected $fillable = [
        'nomor_surat',
        'name_lengkap' ,
        'tempat_lahir' ,
        'tanggal_lahir',
        'pendidikan' ,
        'alamat' ,
        'rt' ,
        'rw' ,
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
