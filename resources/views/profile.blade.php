@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-fullSize p-4 bg mx-auto">
        @include('components/breadcrumbs', ['url' => '/', 'params' => request()->segment(count(request()->segments()))])
    </div>

    <h1>Profile page</h1>


@endsection