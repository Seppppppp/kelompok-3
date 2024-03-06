<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DETAIL IMAGE</title>
</head>
<body>
    {{-- === navbar === --}}
    @include('layouts.navbar')
    {{-- === akhir navbar === --}}


    <div class="container mx-auto px-10">
            <div class="w-full max-w-10xl rounded  bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                <div class="md:flex items-center -mx-10">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="relative">
                            <a href="{{ route('detailImage.unduh',$dataImage->lokasiFile) }}" target="_blank" class="z-10 absolute px-5 bg-blue-500 text-white rounded-full py-2 mb-10 m-5 hover:bg-gray-400 shadow-md">Unduh Gambar</a>
                            <img src="{{ asset('image/'.$dataImage->lokasiFile) }}" class="w-full rounded-xl z-1 relative z-1" alt="">
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-10 overflow-y-auto">
                        <div class="mb-10">
                            <div class="flex flex-col items-start">
                                <div class="logo flex items-center justify-center gap-5 py-10">
                                    <img src="{{asset('assets/image/ls.png')}}" class="w-[9em]" alt="logoPinterest" />
                                    
                                </div>
                                <h1 class="font-bold  text-4xl">{{ $dataImage->judulFoto }}</h1>
                                <p class="text-1xl">{{ $dataImage->deskripsiFoto }}</p>
                            </div>

                        </div>
                        <div class="flex justify-between">
                            <div class="inline-block align-bottom mr-5">
                                <h1 class="font-bold text-2xl">{{$data->namalengkap}}</h1>
                                <h2>{{$data->alamat}}</h2>
                            </div>
                            <div class="inline-block align-bottom">
                                  <!-- Menampilkan Tombol Like -->

                            <form action="{{ route('like') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="fotoID" value="{{ $dataImage->fotoID }}">
                                    <button type="submit" class="flex justify-center items-center gap-2">
                                        <svg viewBox="0 -0.5 21 21" version="1.1" width="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>like [#fd7272]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-259.000000, -760.000000)" fill="#fd7272"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M203,620 L207.200006,620 L207.200006,608 L203,608 L203,620 Z M223.924431,611.355 L222.100579,617.89 C221.799228,619.131 220.638976,620 219.302324,620 L209.300009,620 L209.300009,608.021 L211.104962,601.825 C211.274012,600.775 212.223214,600 213.339366,600 C214.587817,600 215.600019,600.964 215.600019,602.153 L215.600019,608 L221.126177,608 C222.97313,608 224.340232,609.641 223.924431,611.355 L223.924431,611.355 Z" id="like-[#fd7272]"> </path> </g> </g> </g> </g></svg>
                                        
                                        <p class="font-bold">{{$like}}</p>
                                        <p  > </p>

                                        <svg width="30px"viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    
                                            <title>dislike [#1388]</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs>
                                        
                                        </defs>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Dribbble-Light-Preview" transform="translate(-139.000000, -760.000000)" fill="#fd7272">
                                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                                        <path d="M101.900089,600 L99.8000892,600 L99.8000892,611.987622 L101.900089,611.987622 C103.060339,611.987622 104.000088,611.093545 104.000088,609.989685 L104.000088,601.997937 C104.000088,600.894077 103.060339,600 101.900089,600 M87.6977917,600 L97.7000896,600 L97.7000896,611.987622 L95.89514,618.176232 C95.6819901,619.491874 94.2455904,620.374962 92.7902907,619.842512 C91.9198408,619.52484 91.400091,618.66273 91.400091,617.774647 L91.400091,612.986591 C91.400091,612.43516 90.9296911,611.987622 90.3500912,611.987622 L85.8728921,611.987622 C84.0259425,611.987622 82.6598928,610.35331 83.0746427,608.641078 L84.8995423,602.117813 C85.1998423,600.878093 86.360092,600 87.6977917,600" id="dislike-[#1388]">
                                        
                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                        <p class="font-bold">{{$like}}</p>
                                    </button>
                                </form>

                                {{-- <form action="{{ route('unlike') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="fotoID" value="{{ $dataImage->fotoID }}">
                                    <button type="submit" class="flex justify-center items-center gap-2">
                                   unlike
                                    </button>
                                </form> --}}


                            </div>
                        </div>

                    </div>
                </div>
            </div> <br>
            <div class="flex justify-between items-center">
            <h1 class="font-bold text-3xl text-blue-500 ">What do you think? </h1>
            @guest
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 rounded-lg" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>Yuk ikut berkomentar dan kasih like di gambarnya dengan Register dan Login</p>
              </div>
            @endguest
            </div>
            <section class="flex justify-center py-5 gap-5 antialiased">

                @auth
                    @include('profile.komentar')
                @endauth

                <div class="container w-full overflow-y-auto flex flex-col  h-96">
                @if ($komentar->count() > 0)
                    @foreach ($komentar as $Komentar)
                        <div class="bg-gray-700 rounded-lg p-5 relative mb-5">
                            @php
                                $currentUser = $users->firstWhere('id', $Komentar->id);
                            @endphp
                            @if ($currentUser)
                                <h1 class="font-bold relative mb-2 text-white">{{$currentUser->namalengkap}}</h1>
                            @else
                                <p class="font-bold relative mb-2 text-white">Unknown User</p>
                            @endif
                            <p class="relative mb-2 text-white">{{ $Komentar->isiKomentar }}</p>
                            <h6 class="font-bold text-gray-400">{{ $Komentar->waktu }}</h6>
                        </div>
                    @endforeach
                @else
                <div class="flex justify-center items-center">
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><lottie-player src="https://lottie.host/eef10375-554b-4974-aa38-08e6b2c1d504/DvwLp66ccO.json" background="##ffffff" speed="1" style="width: 200px;" loop  autoplay direction="1" mode="normal"></lottie-player>
                    <div class="w-80 text-1xl"><span class="text-blue-500">Belum ada komentar!</span>
                        @auth
                        Tambahkan satu untuk memulai percakapan.
                        @else
                        Yuk berkomentar dengan melakukan Register dan Login
                        @endauth

                        </div>
                </div>
                @endif
                </div>



                </div>
            </section>

            <section class="py-5 container mx-auto flex flex-col justify-center items-center">
               
            </section>
        </div>

</body>
</html>
