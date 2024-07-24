@extends('layout/main')
@section('content')
    @include('components/navbar')
    
    <div class="w-fullSize mx-auto font-poppins">
        @include('components/breadcrumbs', ['url' => "dashboard", 'params' => "Create Property"])

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
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('guest', 'dec')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                        </svg>
                    </div>
                    
                    <span id="guestNumber" class="text-3xl my-auto font-semibold">0</span>
                    
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
                    
                    <span id="bedroomNumber" class="text-3xl my-auto font-semibold">0</span>
                    
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
                    
                    <span id="bedNumber" class="text-3xl my-auto font-semibold">0</span>
                    
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
                    
                    <span id="bathNumber" class="text-3xl my-auto font-semibold pointer-events-none">0</span>
                    
                    <div class="flex justify-center p-2 border border-slate-200 rounded-md hover:bg-gray-100" onclick="addNumberOfAccomodation('bath', 'inc')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </main>
            </div>

            
            {{-- Amenities --}}
            <h1 class="font-semibold mt-9 mb-5 text-lg pointer-events-none">Accomodation Details</h1>

            <div class="w-full grid grid-cols-2 gap-y-3">
                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Unlimited Cloud Storage</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Self-Lighting Fire Pit</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Outdoor Furniture (Tree Stumps)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Hot Shower (Sun Required)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Natural Heating (Bring A Coat)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Bed Linens (Leaves)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Picnic Table (Yet Another Tree Stump)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Solar Power (Daylight)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Cooking Utensils (Sticks And Stones)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Lanterns (Fireflies)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">VIP Parking For Squirrels</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Bbq Grill With A Masterchef Diploma</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Private Bathroom (Bushes Nearby)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Kitchenette (Aka Fire Pit)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Air Conditioning (Breeze From The West)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Towels (More Leaves)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Hammock (Two Trees And A Rope)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Water Supply (River A Mile Away)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">Cool Box (Hole In The Ground)</label>
                </div>

                <div class="flex gap-x-2 font-semibold">
                    <input class="border-2 checked:border-primary" type="checkbox" name="amenities">
                    <label class="text-sm" for="">First Aid Kit (Hope And Prayers)</label>
                </div>
            </div>


            {{-- INPUT FOR ACCOMODATION --}}
            <input type="hidden" name="guest" id="guestInput">
            <input type="hidden" name="guest" id="bedroomInput">
            <input type="hidden" name="guest" id="bedInput">
            <input type="hidden" name="guest" id="bathInput">

            <button type="submit"  class="bg-primary py-2 px-8 text-white font-semibold rounded-md mt-10 cursor-default">Create Property</button>
        </form>
    </div>



    <script>
        
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