<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(Request $request) {
        $dataCategory = category::all();
        return view('profile.upload',['user' => $request->user(),], compact('dataCategory'));
    }

        public function store(Request $request) {

          $request->validate([
            'judulFoto' => ['required', 'max:50' , 'min:3'],
            'deskripsiFoto' => ['required', 'max:255' , 'min:3'],
            'categoryID' => ['required'],
            'id' => ['required'],
            'lokasiFile' => ['required', 'mimes:jpg,jpeg,png,svg', 'max:2048'],
        ]);

        $foto_file = $request->file('lokasiFile');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') ."." . $foto_ekstensi;
        $foto_file->move(public_path('image'), $foto_nama);

        $data = [
            'judulFoto' => $request->judulFoto,
            'deskripsiFoto' => $request->deskripsiFoto,
            'categoryName' => $request->categoryID,
            'id' => $request->id,
            'lokasiFile' => $foto_nama,
        ];

         Foto::create($data);
          return redirect('/dataImage')->with('success', 'Image successfully uploaded 👌😍');
    }

    public function update(Request $request, $id) {
    $request->validate([
        'judulFoto' => ['required'],
        'deskripsiFoto' => ['required'],
        'categoryID' => ['required'],
        // 'id' => ['required'], // Anda mungkin tidak perlu memvalidasi 'id' karena digunakan untuk pencarian
        'lokasiFile' => ['required', 'image'], // Anda mungkin ingin memvalidasi file gambar jika ingin mengizinkan pembaruan
    ]);

    $foto = Foto::findOrFail($id); // Cari foto berdasarkan ID

    // Lakukan validasi apakah foto ditemukan
    if (!$foto) {
        return redirect('/dataImage')->with('error', 'Foto tidak ditemukan');
    }

    $foto_file = $request->file('lokasiFile');
    if ($foto_file) {
        $foto_ekstensi = $foto_file->getClientOriginalExtension();
        $foto_nama = date('ymdhis') ."." . $foto_ekstensi;
        $foto_file->move(public_path('image'), $foto_nama);
        $foto->lokasiFile = $foto_nama; // Update lokasi file jika ada perubahan
    }

    // Update data foto
    $foto->judulFoto = $request->judulFoto;
    $foto->deskripsiFoto = $request->deskripsiFoto;
    $foto->categoryName = $request->categoryID;
    // Tidak perlu memperbarui 'id' jika 'id' adalah kunci utama yang tidak berubah

    // Simpan perubahan
    $foto->save();

    return redirect('/dataImage')->with('success', 'Foto berhasil diperbarui');
}


}
