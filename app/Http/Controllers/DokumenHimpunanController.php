<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subKategori;
use App\Models\subSubKategori;
use App\Models\document;

class DokumenHimpunanController extends Controller
{
    public function himpunan()
    {
        $subKategori = subKategori::join(
            'table_kategori as kat',
            'table_sub_kategori.id_kategori',
            '=',
            'kat.id_kategori'
        )
            ->where('kat.nama_kategori', ['himpunan'])
            ->get();
        $subSubKategori = subSubKategori::join(
            'table_sub_kategori as sub',
            'table_sub_sub_kategori.id_subKategori',
            '=',
            'sub.id_subKategori'
        )
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('kat.nama_kategori', ['himpunan'])
            ->get();
        return view(
            "himpunan.dokumen-himpunan",
            compact("subKategori", "subSubKategori")
        );
    }

    public function index_dokumenHimpunan()
    {
        $document = document::select('table_document.*', 'sub.*', 'kat.nama_kategori')
            ->join('table_sub_kategori as sub', 'sub.id_subKategori', '=', 'table_document.id_subKategori')
            ->join('table_kategori as kat', 'sub.id_kategori', '=', 'kat.id_kategori')
            ->where('kat.nama_kategori', ['himpunan'])
            ->get();
        // dd($document);
        return view(
            "himpunan.dokumenHimpunan.index",
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
        return view('himpunan.dokumenEdit', compact('document'));
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
        return view('himpunan.dokumenHimpunan.docDetail', compact('document'));
    }
}
