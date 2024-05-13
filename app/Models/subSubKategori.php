<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subSubKategori extends Model
{
    use HasFactory;

    public function sub_kategori()
    {
        return $this->hasOne(User::class, 'id_subKategori', 'table_sub_kategori');
    }
}
