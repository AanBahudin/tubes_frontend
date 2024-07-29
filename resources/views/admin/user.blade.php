@extends('layout/main')
@section('content')
    @include('components/navbar')
    

    <div class="w-[70%] mx-auto">
        @include('components/userCategory_admin')
    </div>

    @include('components/user_card')
@endsection