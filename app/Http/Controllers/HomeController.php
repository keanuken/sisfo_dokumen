<?php

namespace App\Http\Controllers;

use App\Models\document;
use Illuminate\Http\Request;
use App\Models\subKategori;

class HomeController extends Controller
{
    public function cardHome()
    {
        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        $documentPrivate = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'private')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('home', compact('documentPublik', 'documentPrivate'));
    }

    public function cardBeranda()
    {
        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        $documentPrivate = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'private')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('beranda.home', compact('documentPublik', 'documentPrivate'));
    }

    public function homePublik()
    {
        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('dokumen-publik', compact('documentPublik'));
    }

    public function indexPublik()
    {
        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('beranda.docPublik', compact('documentPublik'));
    }

    public function indexPrivate()
    {
        $documentPrivate = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'private')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('beranda.docPrivate', compact('documentPrivate'));
    }

    public function detail($id_dokumen)
    {
        $document = document::find($id_dokumen);
        // dd($document);
        return view('docDetail', compact('document'));
    }

    public function detailDokumen($id_dokumen)
    {
        $document = document::find($id_dokumen);
        // dd($document);
        return view('beranda.docDetail', compact('document'));
    }
}
