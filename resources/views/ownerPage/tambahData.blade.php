@extends('layout/main')
@section('content')
    @include('components/navbar')
    
    <div class="w-fullSize mx-auto font-poppins">
        @include('components/breadcrumbs', ['params' => "Create Property"])

        <form method="POST" enctype="multipart/form-data" class="p-10 border border-slate-200 rounded-md">
            @csrf
            <h1 class="text-lg">General Info</h1>

            {{-- double input --}}
            <div class="w-full flex gap-x-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Name (20 Limit)</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="name" required autofocus>
                </main>

                <main class="flex-1">
                    <label for="tagline" class="text-sm">Tagline Name (30 Limit)</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="tagline" required>
                </main>
            </div>

            <div class="w-full flex gap-x-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Price $</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="name" required autofocus>
                </main>

                <main class="flex-1">
                    <label for="categories" class="text-sm">Categories</label>
                    <select class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" name="categories" id="categories">
                        <option value="CABIN">Cabin</option>
                        <option value="AIRSTREAM">Airstream</option>
                        <option value="TENT">Tent</option>
                        <option value="WAREHOUSE">Warehouse</option>
                        <option value="COTTAGE">Cottage</option>
                        <option value="MAGIC">Magic</option>
                        <option value="CONTAINER">Container</option>
                        <option value="CARAVAN">Caravan</option>
                        <option value="TINY">Tiny</option>
                        <option value="LODGE">Lodge</option>
                    </select>
                </main>
            </div>

            <label for="description" class="text-sm">Description (10 - 1000 words)</label>
            <textarea class="border border-slate-100 w-full resize-none p-4 text-sm rounded-md focus:outline-primary mt-2" name="description" id="description" cols="30" rows="10"></textarea>

            <div class="w-full flex gap-x-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Country</label>
                    <select class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" name="categories" id="categories">
                        <option value="Indonesia">Indonesia</option>
                        <option value="AIRSTREAM">Airstream</option>
                        <option value="TENT">Tent</option>
                        <option value="WAREHOUSE">Warehouse</option>
                        <option value="COTTAGE">Cottage</option>
                        <option value="MAGIC">Magic</option>
                        <option value="CONTAINER">Container</option>
                        <option value="CARAVAN">Caravan</option>
                        <option value="TINY">Tiny</option>
                        <option value="LODGE">Lodge</option>
                    </select>
                </main>

                <main class="flex-1">
                    <label for="image" class="text-sm">Image</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="file" name="tagline" required>
                </main>
            </div>


        </form>
    </div>
@endsection