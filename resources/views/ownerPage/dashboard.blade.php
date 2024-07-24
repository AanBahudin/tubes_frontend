@extends('layout/main')
@section('content')
    @include('components/navbar')
    <h1>owner page</h1>

    <div class="relative -z-20 w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-10 p-4">
        @include('components/card')
    </div>
@endsection