<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    public $timestamp = false;
    protected $fillable = ['ID_AKUN','NAMA_MATERI','ISI_MATERI'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
