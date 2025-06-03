<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class memberModel extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $primaryKey = 'id_member';
    public $timestamps = false;

    protected $fillable = ['id_member', 'nama_member','alamat','program_studi'];
}
