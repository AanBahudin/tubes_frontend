@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-fullSize mx-auto font-poppins">
        <h1 class="text-2xl font-semibold my-10">My Property</h1>
    </div>

    <div class="relative -z-20 w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-10">
        @include('components/card')
    </div>
@endsection