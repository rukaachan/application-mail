<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;
    protected $table = 'jenis_surat';
    protected $fillable = ['jenis_surat'];
    protected $primaryKey = 'id_jenis_surat';
    public $timestamps = false;

    public function surats()
    {
        return $this->hasMany(Surat::class, 'id_jenis_surat');
    }
}
