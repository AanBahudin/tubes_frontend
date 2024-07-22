@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[70%e] mx-auto">
        @include('components/category')
    </div>

    {{-- CARD SECTION --}}
    <div class="w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-10 p-4">
        @include('components/card')
    </div>
@endsection