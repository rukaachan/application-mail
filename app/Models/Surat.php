<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $fillable = ['id_surat','id_user', 'id_jenis_surat', 'tanggal_surat', 'ringkasan', 'file'];
    protected $primaryKey = 'id_surat';
    public $timestamps = false;


    // One to Many
    public function jenis()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    // One to Many
    public function user()
    {
        return $this->belongsTo(TblUser::class, 'id_user');
    }

    // Get Attribute column
    public function getJenisSuratAttribute()
    {
        return JenisSurat::find($this->attributes['id_jenis_surat'])->jenis_surat;
    }
};
