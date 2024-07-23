@extends('layout/main')
@section('content')
    @include('components/navbar')
    
    <div class="w-fullSize mx-auto font-poppins">
        <h2 class="my-5 text-2xl font-semibold">Create Property</h2>

        <section class="p-10 border border-slate-200 rounded-md">
            <h1 class="text-lg">General Info</h1>

            {{-- double input --}}
            <div class="w-full flex justify-between">

                <main>
                    <label for="title">Name</label>
                    <input type="text">
                </main>

            </div>
        </section>
    </div>
@endsection