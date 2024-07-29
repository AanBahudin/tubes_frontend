@extends('layout/main')
@section('content')
    @include('components/navbar')
    
    <div class="w-fullSize mx-auto font-poppins">
        @include('components/breadcrumbs', ['url' => "/owner/dashboard", 'params' => "Edit Property"])

        <form method="POST" action="{{ url('/owner/update/' . $product['id']) }}" enctype="multipart/form-data" class="p-10 border border-slate-200 rounded-md">
            @csrf
            <h1 class="text-lg mb-5 font-semibold">General Info</h1>

            {{-- double input --}}
            <div class="w-full flex gap-x-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Name (20 Limit)</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="nama" required autofocus value="{{ $product['nama'] }}">
                </main>

                <main class="flex-1">
                    <label for="tagline" class="text-sm">Tagline Name (30 Limit)</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="text" name="tagline" required value="{{ $product['nama'] }}">
                </main>
            </div>

            {{-- double input --}}
            <div class="w-full flex gap-x-10 justify-between my-5">
                <main class="flex-1">
                    <label for="title" class="text-sm">Price $</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="number" name="price" required autofocus value="{{ $product['price'] }}">
                </main>

            
            <main class="flex-1">
                <label for="categories" class="text-sm">Categories</label>
                <select class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" name="categories" id="categories" value="{{ $product['categories'] }}">
                    @php
                        $categoryData = ['CABIN', 'AIRSTREAM', 'TENT', 'WAREHOUSE', 'COTTAGE', 'MAGIC','CONTAINER', 'CARAVAN', 'TINY', 'LODGE'];
                    @endphp
                    @foreach ($categoryData as $data)
                        <option class="capitalize" value="{{ $data }}" {{ $product['categories'] == $data ? 'selected' : '' }}>{{ $data }}</option>
                    @endforeach
                </select>
            </main>
            
            </div>

            <div class="w-full my-5">
                <label for="description" class="text-sm">Description (10 - 1000 words)</label>
                <textarea class="border border-slate-200 w-full resize-none p-4 text-sm rounded-md focus:outline-primary mt-2" name="description" id="description" cols="30" rows="5" >{{ $product['description'] }}</textarea>
            </div>

            <div class="w-full flex-col gap-y-10 justify-between">
                <main class="flex-1">
                    <label for="title" class="text-sm">Country</label>
                    <input type="text" class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" name="country" id="country" value="{{ $product->country }}">
                </main>

                @if ($product->image)
                    <img class="img-preview h-72 w-auto object-cover rounded-md my-5" src="{{ asset('storage/' . $product->image) }}" alt="" id="img-preview" >
                @else
                    <img class="img-preview h-36 w-auto object-cover rounded-md my-5" src="{{ asset('no.jpg') }}" alt="" id="img-preview" >
                @endif

               

                <main class="flex-1">
                    <label for="image" class="text-sm">Image</label>
                    <input class="block border-2 border-slate-200 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="Cozy Cabin" type="file" name="image" id="image" onchange="previewImage()">
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
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('guest', 'dec')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="guestNumber" class="text-3xl my-auto font-semibold">{{ $product['guest'] }}</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('guest', 'inc')">
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
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bedroom', 'dec')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="bedroomNumber" class="text-3xl my-auto font-semibold">{{ $product['bedroom'] }}</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bedroom', 'inc')">
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
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bed', 'dec')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="bedNumber" class="text-3xl my-auto font-semibold">{{ $product['bed'] }}</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bed', 'inc')">
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
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bath', 'dec')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="bathNumber" class="text-3xl my-auto font-semibold pointer-events-none">{{ $product['bath'] }}</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bath', 'inc')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </main>
            </div>  


            {{-- INPUT FOR ACCOMODATION --}}
            <input type="hidden" name="guest" id="guestInput" value="{{ $product['guest']}}">
            <input type="hidden" name="bedroom" id="bedroomInput" value="{{ $product['bedroom']}}">
            <input type="hidden" name="bed" id="bedInput" value="{{ $product['bed']}}">
            <input type="hidden" name="bath" id="bathInput" value="{{ $product['bath']}}">

            <button type="submit"  class="bg-primary py-2 px-8 text-white font-semibold rounded-md mt-10 cursor-default">Update Property</button>
        </form>
    </div>



    <script>
        
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        // get number of each accomodations
        let numberOfGuest = document.getElementById('guestNumber');
        let numberOfBedroom = document.getElementById('bedroomNumber');
        let numberOfBeds = document.getElementById('bedNumber');
        let numberOfBaths = document.getElementById('bathNumber')

        // get each input for accomodations
        const guestInput = document.getElementById('guestInput');
        const bedroomInput = document.getElementById('bedroomInput');
        const bedInput = document.getElementById('bedInput');
        const bathInput = document.getElementById('bathInput');

        
        const addNumberOfAccomodation = (accomodation, buttonType) => {
            if (accomodation === "guest") {

                let currentNumberOfGuest = parseInt(numberOfGuest.textContent, 10);

                if (buttonType === 'inc') {
                    currentNumberOfGuest += 1;
                } else {
                    if (currentNumberOfGuest <= 0) {
                        currentNumberOfGuest = 0
                    } else {
                        currentNumberOfGuest -= 1;
                    }
                }

                guestInput.value = currentNumberOfGuest
                numberOfGuest.textContent = currentNumberOfGuest

            } else if (accomodation === 'bedroom') {
                let currentNumberOfBedroom = parseInt(numberOfBedroom.textContent, 10);
                if (buttonType === 'inc') {
                    currentNumberOfBedroom += 1;
                } else {
                    if (currentNumberOfBedroom <= 0) {
                        currentNumberOfBedroom = 0
                    } else {
                        currentNumberOfBedroom -= 1;
                    }
                }

                bedroomInput.value = currentNumberOfBedroom
                numberOfBedroom.textContent = currentNumberOfBedroom
            } else if (accomodation === 'bed' ) {
                let currentNumberOfBed = parseInt(numberOfBeds.textContent, 10);
                if (buttonType === 'inc') {
                    currentNumberOfBed += 1;
                } else {
                    if (currentNumberOfBed <= 0) {
                        currentNumberOfBed = 0
                    } else {
                        currentNumberOfBed -= 1;
                    }
                }

                bedInput.value = currentNumberOfBed
                numberOfBeds.textContent = currentNumberOfBed
            } else {
                let currentNumberOfBaths = parseInt(numberOfBaths.textContent, 10);
                if (buttonType === 'inc') {
                    currentNumberOfBaths += 1;
                } else {
                    if (currentNumberOfBaths <= 0) {
                        currentNumberOfBaths = 0
                    } else {
                        currentNumberOfBaths -= 1;
                    }
                }

                bathInput.value = currentNumberOfBaths
                numberOfBaths.textContent = currentNumberOfBaths
            }
        }


    </script>
@endsection