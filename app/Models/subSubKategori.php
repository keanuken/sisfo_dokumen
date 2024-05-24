<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subSubKategori extends Model
{
    use HasFactory;

    protected $table = 'table_sub_sub_kategori';

    public function sub_kategori()
    {
        return $this->belongsTo(subKategori::class, 'id_subKategori', 'table_sub_kategori');
    }
}
