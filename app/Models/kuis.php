<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuis extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $primaryKey = 'ID_QUIZ';
    public $timestamps = false;
    protected $fillable = ['ID_MATERI','PERTANYAAN','JAWABANA','JAWABANB','JAWABANC','JAWABAN_BENAR'];

    public function materi()
    {
        return $this->belongsTo(materi::class);
    }

}
