<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use App\Models\Komentarfoto;
use App\Models\Likefoto;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    function index(Request $request) {
        // === Dapatkan ID pengguna yang sedang login === //
        $user_id = Auth::id();
        // === Dapatkan data dari database berdasarkan ID pengguna yang sedang login === //
        $data = User::where('id', $user_id)->get();
        $dataImage = Foto::where('id', $user_id)->get();
        return view('profile.dataImage',['user' => $request->user()], compact('dataImage','data'));
    }

    public function edit($fotoID, $id , Request $request): View
    {
        $dataCategory = category::all();
        $user_id = Auth::id();
        $dataUser = User::where('id', $user_id)->get();
        $data = User::where('id', $id)->first();
        $dataImage = Foto::where('fotoID', $fotoID)->first();
        return view('profile.editFoto',['user' => $request->user()],compact('dataImage', 'data', 'dataUser','dataCategory'));
    }


        public function update(Request $request, $fotoID) {
            $request->validate([
                'judulFoto' => ['required'],
                'deskripsiFoto' => ['required'],
                'categoryID' => ['required'],
                'id' => ['required'],

            ]);


            if($request->hasFile('lokasiFile')) {
                $request->validate([
                    'lokasiFile' => ['required', 'mimes:jpg,jpeg,png,svg', 'max:2048'],
                ]);

                $foto_file = $request->file('lokasiFile');
                $foto_ekstensi = $foto_file->extension();
                $foto_nama = date('ymdhis') ."." . $foto_ekstensi;
                $foto_file->move(public_path('image'), $foto_nama);

                $data = Foto::where('fotoID',$fotoID)->first();
                File::delete(public_path('image').'/'.$data->foto);

                $data['lokasiFile'] = $foto_nama;
        }

        $data = [
            'judulFoto' => $request->judulFoto,
            'deskripsiFoto' => $request->deskripsiFoto,
            'categoryName' => $request->categoryID,
            'id' => $request->id,

        ];


            Foto::where('fotoID',$fotoID)->update($data);
            return redirect('/dataImage')->with('update','Successfully edited the post 👌👌');

        }

    public function delete($fotoID) {
        $data = Foto::where('fotoID',$fotoID)->first();
        File::delete(public_path('image').'/'.$data->lokasiFile);
        Foto::where('fotoID', $fotoID)->delete();
        Komentarfoto::where('fotoID', $fotoID)->delete();
        Likefoto::where('fotoID', $fotoID)->delete();
        return back()->with('delete', 'Image successfully deleted 😁');
    }

}

  // $foto = [
            //     'fotoID' => $fotoID,
            //     'judulFoto' => $request->judulFoto,
            //     'deskripsiFoto' => $request->deskripsiFoto,
            //     'categoryName' => $request->categoryID,
            //     'id' => $request->id,
            //     'lokasiFile' => $request->lokasiFile,
            // ];
