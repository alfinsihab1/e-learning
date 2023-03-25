<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';
    protected $primaryKey = 'id_jawaban';
    protected $fillable = [
        'id_soal',
        'id_user',
        'id_mapel',
        'jawaban_soal'
    ];

    /**
     * Get the soals that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soals()
    {
        return $this->belongsTo(Soal::class, 'id_soal', 'id_soal');
    }

    /**
     * Get the mapel that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mapel() 
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }

    /**
     * Get the user that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() 
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}

