@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[70%] mx-auto">
        @include('components/category')
    </div>

    @if ($products->isNotEmpty())
        <div class="w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-10 p-4">
            @include('components/card')
        </div>
    @else
        <div class="font-poppins text-black font-semibold w-fullSize mx-auto mt-20 p-4">
            <h2 class="text-xl">No Results</h2>
        </div>
    @endif

@endsection