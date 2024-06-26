<?php

namespace App\Http\Controllers;

use App\Models\document;
use App\Models\kategori;
use App\Models\subKategori;
use App\Models\subSubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DokumenAdminController extends Controller
{
    public function prodi()
    {
        // $subKategori = subKategori::all();
        // $subKategori = subKategori::join(
        //     'table_kategori as kat',
        //     'table_sub_kategori.id_kategori',
        //     '=',
        //     'kat.id_kategori'
        // )
        //     ->where('table_sub_kategori.id_kategori', 2)
        //     ->get();
        // $subSubKategori = subSubKategori::join(
        //     'table_sub_kategori as sub',
        //     'table_sub_sub_kategori.id_subKategori',
        //     '=',
        //     'sub.id_subKategori'
        // )
        //     ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
        //     ->where('kat.id_kategori', 2)
        //     ->get();

        $kategori = kategori::all();
        $subKategori = subKategori::all();
        $subSubKategori = subSubKategori::all();

        return view(
            "admin.dokumen-prodi",
            compact('kategori', "subKategori", "subSubKategori")
        );
    }

    // public function himpunan()
    // {
    //     $subKategori = subKategori::join(
    //         'table_kategori as kat',
    //         'table_sub_kategori.id_kategori',
    //         '=',
    //         'kat.id_kategori'
    //     )
    //         ->where('table_sub_kategori.id_kategori', 1)
    //         ->get();
    //     $subSubKategori = subSubKategori::join(
    //         'table_sub_kategori as sub',
    //         'table_sub_sub_kategori.id_subKategori',
    //         '=',
    //         'sub.id_subKategori'
    //     )
    //         ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
    //         ->where('kat.id_kategori', 1)
    //         ->get();
    //     return view(
    //         "admin.dokumen-himpunan",
    //         compact("subKategori", "subSubKategori")
    //     );
    // }

    public function index_dokumenHimpunan()
    {
        $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('kat.nama_kategori', ['himpunan'])
            ->get();
        // dd($document);
        return view(
            "admin.dokumenHimpunan.index",
            compact("document")
        );
    }

    public function index_dokumenProdi()
    {
        $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->whereNotIn('kat.nama_kategori', ['himpunan'])
            ->get();
        // dd($document);
        return view(
            "admin.dokumenProdi.index",
            compact("document")
        );
    }

    public function store_dokumen(Request $request)
    {
        // dd($request->all());
        // Validasi input termasuk gambar
        $validatedData = $request->validate([
            "gambar" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "subKategori" => "required",
            "subSubKategori" => "nullable",
            "nama" => "required",
            "judul" => "required",
            "versi" => "required",
            "tautan" => "required",
            "status" => "required",
        ]);

        // proses upload jika gambar tidak di input == null
        if (!$request->hasFile("gambar")) {
            $gambar = $request->file("gambar");
            document::create([
                'id_subKategori' => $validatedData['subKategori'],
                'id_subSubKategori' => $validatedData['subSubKategori'],
                'nama_dokumen' => $validatedData['nama'],
                'judul_dokumen' => $validatedData['judul'],
                'versi_dokumen' => $validatedData['versi'],
                'tautan_dokumen' => $validatedData['tautan'],
                'status' => $validatedData['status'],
                'image_preview' => $gambar,
            ]);

            return back()->with('success', 'Dokumen berhasil diunggah.');
        }

        // Proses upload gambar jika ada
        if ($request->hasFile("gambar")) {
            $imageOri = $request->file("gambar");
            $rename = "Image_" . now()->format("YmdHis") . "." . $imageOri->getClientOriginalExtension();
            $imageOri->move(public_path("uploads"), $rename);

            // Simpan data dokumen ke database
            document::create([
                'id_subKategori' => $validatedData['subKategori'],
                'id_subSubKategori' => $validatedData['subSubKategori'],
                'nama_dokumen' => $validatedData['nama'],
                'judul_dokumen' => $validatedData['judul'],
                'versi_dokumen' => $validatedData['versi'],
                'tautan_dokumen' => $validatedData['tautan'],
                'status' => $validatedData['status'],
                'image_preview' => $rename,
            ]);

            return redirect()->back()->with("success", "Dokumen berhasil diunggah.");
        }
    }

    public function editDokumen($id_dokumen)
    {
        $document = document::find($id_dokumen);
        // dd($document);
        return view('admin.dokumenEdit', compact('document'));
    }

    public function updateDokumen($id_dokumen, Request $request)
    {
        // Validasi input termasuk gambar
        $validatedData = $request->validate([
            "gambar" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "id_subKategori" => "required",
            // "subSubKategori" => "nullable",
            "nama" => "required",
            "judul" => "required",
            "versi" => "required",
            "tautan" => "required",
            "status" => "required",
        ]);

        $document = document::find($id_dokumen);

        // proses update jika gambar tidak di input == null
        if (!$request->hasFile("gambar")) {
            $document->update([
                'id_subKategori' => $validatedData['id_subKategori'],
                // 'id_subSubKategori' => $validatedData['subSubKategori'],
                'nama_dokumen' => $validatedData['nama'],
                'judul_dokumen' => $validatedData['judul'],
                'versi_dokumen' => $validatedData['versi'],
                'tautan_dokumen' => $validatedData['tautan'],
                'status' => $validatedData['status'],
            ]);

            return back()->with('success', 'Dokumen berhasil diupdate.');
        }

        // Proses update gambar jika ada
        if ($request->hasFile("gambar")) {
            $imageOri = $request->file("gambar");
            $rename = "Image_" . now()->format("YmdHis") . "." . $imageOri->getClientOriginalExtension();
            $imageOri->move(public_path("uploads"), $rename);

            // Update data dokumen ke database
            $document->update([
                'id_subKategori' => $validatedData['id_subKategori'],
                // 'id_subSubKategori' => $validatedData['subSubKategori'],
                'nama_dokumen' => $validatedData['nama'],
                'judul_dokumen' => $validatedData['judul'],
                'versi_dokumen' => $validatedData['versi'],
                'tautan_dokumen' => $validatedData['tautan'],
                'status' => $validatedData['status'],
                'image_preview' => $rename,
            ]);

            return redirect()->back()->with("success", "Dokumen berhasil diupdate.");
        }
    }

    public function deleteDokumen($id_dokumen, Request $request)
    {
        $q = document::find($id_dokumen);
        $q->delete($request->all());
        return redirect()->back()->with("error", "Dokumen berhasil dihapus.");
    }

    public function detail($id_dokumen)
    {
        $document = document::find($id_dokumen);
        // dd($document);
        return view('admin.docDetail', compact('document'));
    }
}
