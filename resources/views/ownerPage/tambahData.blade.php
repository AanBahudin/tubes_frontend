@extends('layout/main')
@section('content')
    @include('components/navbar')
    
    <div class="w-fullSize mx-auto font-poppins">
        @include('components/breadcrumbs', ['params' => "Create Property"])

        <form method="POST" enctype="multipart/form-data" class="p-10 border border-slate-200 rounded-md">
            @csrf
            <h1 class="text-lg mb-5 font-semibold">General Info</h1>

            {{-- double input --}}
            <div class="w-full flex gap-x-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Name (20 Limit)</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="name" required autofocus>
                </main>

                <main class="flex-1">
                    <label for="tagline" class="text-sm">Tagline Name (30 Limit)</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="tagline" required>
                </main>
            </div>

            {{-- double input --}}
            <div class="w-full flex gap-x-10 justify-between my-5">
                <main class="flex-1">
                    <label for="title" class="text-sm">Price $</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="name" required autofocus>
                </main>

                <main class="flex-1">
                    <label for="categories" class="text-sm">Categories</label>
                    <select class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" name="categories" id="categories">
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

            <div class="w-full my-5">
                <label for="description" class="text-sm">Description (10 - 1000 words)</label>
                <textarea class="border border-slate-200 w-full resize-none p-4 text-sm rounded-md focus:outline-primary mt-2" name="description" id="description" cols="30" rows="5"></textarea>
            </div>

            <div class="w-full flex gap-x-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Country</label>
                    <select class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" name="categories" id="categories">
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
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="file" name="tagline" required>
                </main>
            </div>

            <h1 class="font-semibold mt-9 mb-5 text-lg">Accomodation Details</h1>

            {{-- ACCOMODATION --}}

            {{-- GUEST --}}
            <div class="w-full flex justify-between p-6 border border-slate-200 rounded-lg shadow-sm">
                <main>
                    <h5 class="font-semibold">Guest</h5>
                    <p class="text-gray-500">Specify the number of guests</p>
                </main>

                <main class="flex justify-center gap-x-5">
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="guestNumber" class="text-3xl my-auto font-semibold">0</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </main>
            </div>

            {{-- BEDROOMS --}}
            <div class="w-full flex justify-between p-6 border border-slate-200 rounded-lg shadow-sm my-4">
                <main>
                    <h5 class="font-semibold">Bedrooms</h5>
                    <p class="text-gray-500">Specify the number of bedrooms</p>
                </main>

                <main class="flex justify-center gap-x-5">
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="bedroomNumber" class="text-3xl my-auto font-semibold">0</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </main>
            </div>

            {{-- BED --}}
            <div class="w-full flex justify-between p-6 border border-slate-200 rounded-lg shadow-sm my-4">
                <main>
                    <h5 class="font-semibold">Bed</h5>
                    <p class="text-gray-500">Specify the number of Bed</p>
                </main>

                <main class="flex justify-center gap-x-5">
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="bedNumber" class="text-3xl my-auto font-semibold">0</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </main>
            </div>

            {{-- BATHS --}}
            <div class="w-full flex justify-between p-6 border border-slate-200 rounded-lg shadow-sm my-4">
                <main>
                    <h5 class="font-semibold">Baths</h5>
                    <p class="text-gray-500">Specify the number of baths</p>
                </main>

                <main class="flex justify-center gap-x-5">
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="bathNumber" class="text-3xl my-auto font-semibold">0</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </main>
            </div>

        </form>
    </div>
@endsection