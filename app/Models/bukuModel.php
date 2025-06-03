<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bukuModel extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    protected $primaryKey = 'id_buku';
    public $timestamps = false;

    protected $fillable = ['id_buku', 'id_kategori','judul_buku','penerbit','tahun_terbit'];
}
