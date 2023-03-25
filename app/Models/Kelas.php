<?php

namespace App\Models;

use App\Models\Soal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primayKey = 'id_kelas';
    protected $fillable = [
        'id_user',
        'nama_kelas'
    ];

    public function users() 
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
    
}
