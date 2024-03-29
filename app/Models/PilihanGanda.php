<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Jawaban;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PilihanGanda extends Model
{
    use HasFactory;

    protected $table ='pilihan_gandas';
    protected $primaryKey = 'id_soal_pilihan';
    protected $fillable = [
        'id_mapel',
        'id_kelas',
        'judul_soal',
        'id_user',
        'soal',
        'opsi'
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel','id_mapel');
    }

    public function jawab()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function kelasku()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }
}
