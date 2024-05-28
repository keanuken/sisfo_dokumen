<?php

namespace App\Http\Controllers;

use App\Models\document;
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

    // public function index_dokumenHimpunan()
    // {
    //     $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
    //         ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
    //         ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
    //         ->where('kat.id_kategori', 1)
    //         ->get();
    //     // dd($document);
    //     return view(
    //         "admin.dokumenHimpunan.index",
    //         compact("document")
    //     );
    // }

    public function index_dokumenProdi()
    {
        $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('kat.id_kategori', 2)
            ->get();
        // dd($document);
        return view(
            "tables",
            compact("document")
        );
    }
}
