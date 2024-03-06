<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = category::all();
        $dataImage = Foto::all();
        return view('/', compact( 'dataImage', 'category'));
    }
    public function search(Request $request)
    {
        $category = category::all();
        $dataImage = foto::all();

        // query the posts based on the search query
        $query = $request->input('search');
        $dataImage = foto::where('judulfoto','like','%' . $query .'%')->get();
        return view('home', compact( 'dataImage', 'category'));

    }
    public function category(Request $request)
    {

        $category = category::all();
        $dataImage = foto::all();
        
        // Proses data kategori yang dipilih
        $query = $request->input('categori');
        $dataImage = foto::where('categoryName','like','%' . $query .'%')->get();
        // Lanjutkan dengan pemrosesan data sesuai kebutuhan aplikasi Anda
        return view('home', compact( 'dataImage','category'));
    }

    }
    //
    //