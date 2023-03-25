<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\PilihanGanda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';
    protected $primaryKey = 'id_mapel';
    protected $fillable = [
        'nama_mapel',
        'id_mapel',
    ];

    /**
     * Get all of the comments for the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function pilgan()
    {
        return $this->hasMany(PilihanGanda::class);
    }
    
    /**
     * Get the jawaban that owns the Mapel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jawaban(): BelongsTo
    {
        return $this->hasMany(Jawaban::class);
    }

    
}
