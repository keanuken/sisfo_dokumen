<?php

namespace App\Http\Controllers;

use App\Models\document;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\subKategori;
use App\Models\subSubKategori;

class HomeController extends Controller
{
    public function cardHome()
    {
        $kategori = kategori::all();

        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        $documentPrivate = document::select('kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'private')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('home', compact('documentPublik', 'documentPrivate', 'kategori'));
    }

    public function cardSubKategori($id_kategori)
    {

        $subKategori = subKategori::where('id_kategori', $id_kategori)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('sub-kategori', compact('subKategori'));
    }

    public function cardSubSubKategori($id_subKategori)
    {
        $subSubKategori = subSubKategori::where('id_subKategori', $id_subKategori)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($subSubKategori);

        return view('sub-subKategori', compact('subSubKategori'));
    }

    public function cardBeranda()
    {
        $kategori = kategori::all();

        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        $documentPrivate = document::select('kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'private')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('beranda.home', compact('documentPublik', 'documentPrivate', 'kategori'));
    }

    public function homeSubKategori($id_kategori)
    {

        $subKategori = subKategori::where('id_kategori', $id_kategori)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('beranda.sub-kategori', compact('subKategori'));
    }

    public function homeSubSubKategori($id_subKategori)
    {
        $subSubKategori = subSubKategori::where('id_subKategori', $id_subKategori)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($subSubKategori);

        return view('beranda.sub-subKategori', compact('subSubKategori'));
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

    public function indexSub($id_subSubKategori)
    {

        $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('id_subSubKategori', $id_subSubKategori)
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('beranda.dokumen-sub', compact('document'));
    }

    public function subPublik($id_subSubKategori)
    {

        $documentPublik = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('table_document.status', 'publik')
            ->where('id_subSubKategori', $id_subSubKategori)
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('dokumen-subPublik', compact('documentPublik'));
    }

    public function index()
    {
        $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->orderBy('table_document.created_at', 'desc')
            ->get();

        return view('beranda.document', compact('document'));
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
