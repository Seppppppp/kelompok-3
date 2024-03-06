@extends('layouts.main')
@section('content')

<div class="container mx-auto px-10">
     {{-- === header === --}}
    <div class="banner w-full">
        <section class="py-10">
            <div class="banner flex lg:flex-row sm:gap-10 flex-col-reverse justify-center items-center gap-x-20">
                <div class="content-text flex flex-col gap-3">
                    <h1 class="text-4xl w-80 " style="font-family: 'Ubuntu', sans-serif;"><span class="text-red-500">Sky<span class="text-blue-500">ve,</span></span> Capturing Moments, Preserving Memories With Ekplore Our Gallery !</h1>
                    <p>client comfort is our primary goal! </p>
                    <div class="grupsearch ">
                        <form class="py-2" action="{{ url('/search')}}" method="GET">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Search Image..." required>
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>

                    </div>
                </div>
                <div class="content-poto lg:py-0 py-2 ">
                    <img src="{{asset('assets/image/home.png')}}" class="w-[30em]" alt="astronot">
                </div>
            </div>
        </section>
    </div>
     {{-- === akhir header === --}}

    

   
     <div class="container py-3 mx-auto ">
        <div class="content">
        <div class="head flex justify-around items-center">
            <h1 class="font-bold lg:text-2xl text-[13px]  uppercase" style="font-family: 'Ubuntu', sans-serif;"><span class="text-blue-500">Explore</span> Top Image</h1>
            <form id="categoryForm" action="{{ url('/categori')}}" method="GET">
                <select name="categori" class="rounded-full  transform transition duration-500 hover:scale-105 hover:border-red-500 hover:font-semibold hover:transition  select-none" id="categori" >
                    <option selected>Select Category</option>
                    @foreach ($category as $kategori )
                    <option value="{{$kategori->categoryName}}">{{$kategori->categoryName}}</option>
                    @endforeach
                    {{-- === Looping Data Category akhir === --}}
                </select>
            </form>
            </div>
     

        {{-- === data image === --}}
        @if ($dataImage->count() > 0)
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:px-10 px-4  py-5">

    @foreach ( $dataImage as $image )
    <div>
        {{-- <a href="{{ route('detail', ['fotoID' => $image->fotoID]) }}"> --}}
            <a href="{{ url('/detailImage/'.$image->fotoID. '/'. $image->id)}}">
        <img class="object-cover  w-[1080px] h-96 rounded-lg shadow-lg transform transition duration-500 hover:scale-105 hover:shadow-2xl" src="{{ asset('image/' . $image->lokasiFile) }}"  alt="{{$image->judulFoto}}"></a>
    </div>
    @endforeach

</div>
@else

            
<div class="container mx-auto">
    <div class="flex flex-col justify-center items-center">
        <div class="image ">
            <img class="w-96 center items-center mb-10" src="{{asset('assets/image/not.png')}}">
        </div>
        <div class="text  font-semibold text-2xl text-center mb-10 ">
            Image not yet available on the server <br> <span class="text-blue-500">please login and upload the image</span>
        </div>
    </div>
</div>
    @endif

    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('categori').addEventListener('change', function() {
            document.getElementById('categoryForm').submit();
        });
    });
</script>
@endsection





