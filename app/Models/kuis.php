<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuis extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    public $timestamp = false;
    protected $fillable = ['ID_MATERI','PERTANYAAN','JAWABAN1','JAWABAN2','JAWABAN3','JAWABAN_BENAR'];

    public function materi()
    {
        return $this->belongsTo(materi::class);
    }

}
