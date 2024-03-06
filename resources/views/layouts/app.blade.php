@extends('layouts.main')
@section('content')
        <div class="min-h-screen ">            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
@endsection
