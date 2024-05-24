<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;

    protected $table = 'table_document';
    protected $primaryKey = 'id_dokumen';

    protected $fillable = [
        'id_subKategori',
        'id_subSubKategori',
        'nama_dokumen',
        'judul_dokumen',
        'versi_dokumen',
        'tautan_dokumen',
        'status',
        'image_preview'
    ];

    public function subSubKategori()
    {
        return $this->belongsTo(subSubKategori::class, 'id_subSubKategori', 'table_sub_sub_kategori');
    }
}
