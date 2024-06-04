<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skor extends Model
{
    use HasFactory;
    protected $table = 'skor';
    public $timestamps = false;
    protected $fillable = ['ID_USER','ID_MATERI','SKOR','waktu','soal'];

    public function users()
    {
        return $this->belongsTo(users::class);
    }
    public function materi()
    {
        return $this->belongsTo(materi::class);
    }

}
