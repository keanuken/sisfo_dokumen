<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subKategori extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->hasOne(User::class, 'id_kategori', 'table_kategori');
    }
}
