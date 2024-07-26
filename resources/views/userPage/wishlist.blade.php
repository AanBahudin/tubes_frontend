@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-fullSize p-4 bg mx-auto">
        @include('components/breadcrumbs', ['url' => '/', 'params' => request()->segment(count(request()->segments()))])
    </div>

    @if ($products->isNotEmpty())
        <div class="w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-10 p-4">
            @include('components/card_wishlist')
        </div>
    @else
        <div class="font-poppins text-black text-2xl font-semibold w-fullSize mx-auto">
            <h2>You Don't have any favorite place</h2>
            <a class="text-sm px-6 py-2 mt-5 block w-fit bg-primary text-white rounded-md hover:shadow-lg" href="/">Go Explore</a>
        </div>
    @endif

    
@endsection