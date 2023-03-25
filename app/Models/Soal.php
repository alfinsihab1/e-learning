<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jawaban;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';
    protected $primaryKey = 'id_soal';
    

    protected $fillable = [
        'id_mapel',
        'id_kelas',
        'judul_soal',
        'id_user',
        'soal'
    ];

    /**
     * Get the user that owns the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }

    /**
     * Get the user that owns the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jawabanku(): BelongsTo
    {
        return $this->hasMany(Jawaban::class);
    }

    public function kelass()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas','id_kelas');
    }
    
}
