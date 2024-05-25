<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subKategori extends Model
{
    use HasFactory;

    protected $table = 'table_sub_kategori';

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'table_kategori');
    }
}
