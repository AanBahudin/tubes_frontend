@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-fullSize p-4 bg mx-auto">
        @include('components/breadcrumbs', ['params' => request()->segment(count(request()->segments()))])
    </div>

    <div class="w-full md:w-fullSize mx-auto grid grid-cols-1 justify-items-center md:grid-cols-3 xl:grid-cols-4 gap-10 p-4">
        @include('components/card')
    </div>
    
@endsection