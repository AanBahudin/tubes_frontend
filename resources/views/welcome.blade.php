@extends('layout/main')
@section('content')
    @include('components/navbar')

    @if (session()->has('success'))
        <main id="notifBar" class="w-full bg-green-400 p-2 text-center rounded-md shadow-lg" onclick="toggleNotif()">
            <h1 class="font-medium text-white">{{session('success')}}</h1>
        </main>
    @endif
   
    <div class="w-[70%] mx-auto">
        @include('components/category')
    </div>

    

    {{-- CARD SECTION --}}
    

    @if ($products->isNotEmpty())
        <div class="w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-y-10 p-4">
            @include('components/card', ['products' => $products])
        </div>
    @else
        <div class="font-poppins text-black font-semibold w-fullSize mx-auto p-4">
            <h2 class="text-xl">No Results</h2>
            <p class="text-md font-normal">Try changing or removing some of your filters.</p>
            <a class="text-sm px-6 py-2 mt-5 block w-fit bg-primary text-white rounded-md hover:shadow-lg" href="/">Clear Filters</a>
        </div>
    @endif
@endsection