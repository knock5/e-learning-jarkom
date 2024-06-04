<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    protected $primaryKey = 'ID_MATERI';
    public $timestamp = false;
    protected $fillable = ['NAMA_MATERI','ISI_MATERI'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function skor()
    {
        return $this->hasMany(skor::class);
    }
}
