@extends('layouts.main')
@section('content')
        <div class="container mx-auto px-20">
            <div class="w-full ">
                {{ $slot }}
            </div>
        </div>
@endsection
