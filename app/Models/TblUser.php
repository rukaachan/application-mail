<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TblUser extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $fillable = ['username', 'password', 'role'];
    protected $primaryKey = 'id_user';
    protected $casts = [
        'password' => 'hashed',
    ];
    public $timestamps = false;
}
