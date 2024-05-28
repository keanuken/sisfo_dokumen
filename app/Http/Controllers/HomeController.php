<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subKategori;

class HomeController extends Controller
{
    public function card()
    {
        $subKategoriProdi = subKategori::join(
            'table_kategori as kat',
            'table_sub_kategori.id_kategori',
            '=',
            'kat.id_kategori'
        )
            ->where('table_sub_kategori.id_kategori', 2)
            ->get();

        $subKategoriHimpunan = subKategori::join(
            'table_kategori as kat',
            'table_sub_kategori.id_kategori',
            '=',
            'kat.id_kategori'
        )
            ->where('table_sub_kategori.id_kategori', 1)
            ->get();

        return view('card', compact('subKategoriProdi', 'subKategoriHimpunan'));
    }
}
