@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[85%] mx-auto font-poppins pb-10">
        @include('components/breadcrumbs', ['url' => '/', 'params' => $product['nama']])

        <main class="flex justify-between w-full">
            <h1 class="text-3xl font-bold">{{ $product['tagline'] }}</h1>

            @if ($alreadyInWishlist && $isLoggedIn == TRUE)
                <a href="/wishlist/delete/{{ $alreadyInWishlist['id'] }}" class="border rounded-md py-1 px-2 flex justify-center bg-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 my-auto pointer-events-none stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>                  
                </a>
            @else
                <a href="/user/wishlist/{{ $product['id'] }}" class="border rounded-md py-1 px-2 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 my-auto pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>                  
                </a>
            @endif

        </main>
        <img class="rounded-md my-8 object-bottom object-cover h-[500px] w-full" src="{{ asset('storage/' . $product->image) }}" alt="">

        <h4 class="font-bold text-lg">{{ $product['nama'] }}</h4>
        <h5>{{ $product['bed'] }} bedroom · {{ $product['bath'] }} baths ·{{ $product['guest'] }} guests · {{ $product['bed'] }} beds</h5>

        {{-- owner information --}}
        <main class="w-auto flex gap-x-3 border-b border-slate-200 py-4 my-3">
            {{-- profile photo --}}
            @if ($productOwner->image)
                <img class="w-14 h-14 object-cover rounded-md" src="{{ asset('storage/' . $productOwner->image) }}" alt="">
            @else
                <img class="w-14 h-14 object-cover rounded-md" src="{{ asset('public/no.jpg') }}" alt="">
            @endif

            {{-- profile information --}}
            <section class="my-auto">
                <h5>Hosted by <span class="font-semibold capitalize">{{ $productOwner->nama }}</span></h5>
                <h1 class="text-gray-600">Owner · 2 years hosting</h1>
            </section>
        </main>


        <h4 class="text-lg font-bold my-3">Description</h4>
        <p class="leading-loose">{{ $product['description'] }}</p>

        <h4 class="text-lg font-bold mt-5 mb-3">What this place offers</h4>

        {{-- offers container --}}
        <div class="grid grid-cols-2 gap-y-3">
            <main class="flex gap-x-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                  </svg>
                <p class="my-auto">Bbq Grill With A Masterchef Diploma</p>                  
            </main>

            <main class="flex gap-x-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                  </svg>
                <p class="my-auto">Private Bathroom (Bushes Nearby)</p>                  
            </main>

            <main class="flex gap-x-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 stroke-primary my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 0 1 0 3.46" />
                  </svg>
                <p class="my-auto">Outdoor Furniture (Tree Stumps)</p>                  
            </main>
        </div>
        
        {{-- leave a review --}}


        <button onclick="toggleFunc()" id="toggleReview" class="bg-primary {{ $role == "OWNER" || $role == "ADMIN" ? 'hidden' : 'flex-1' }} py-2 px-6 text-white font-semibold text-md rounded-md my-8 cursor-default">Leave a Review</button>

        {{-- review container --}}
        <form id="reviewContainer" method="POST" action="/review/add" class="w-full hidden {{ $role == "OWNER" || $role == "ADMIN" ? 'hidden' : 'block' }} rounded-md py-10 px-8 border border-slate-200 mb-10">
            @csrf
            <label for="rating">Rating</label>
            <select class="block border-2 border-slate-200 px-3 py-1 rounded-md w-1/4 text-sm mt-2 focus:outline-primary placeholder:text-sm" name="rating" id="rating">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>

            <input type="hidden" value="{{$product['id']}}" name="productId">
            <input type="hidden" name="userId" value="{{ $user_id }}">

            <label for="feedback mt-4">Feedback</label>
            <textarea class="border border-slate-200 w-full resize-none p-4 text-sm rounded-md focus:outline-primary mt-2" name="review" id="review" cols="30" rows="5"></textarea>
            <button type="submit" class="bg-primary w-fit py-2 px-8 text-white font-semibold rounded-md mt-4 cursor-default">Review</button>
            
        </form>

        <div class="my-16 gap-x-6 {{ $role != "OWNER" ? 'hidden' : '' }}">
            <a href="/owner/edit/{{ $product['id'] }}" class="bg-primary flex-initial w-full py-2 px-8 text-white font-semibold rounded-md mt-4 cursor-default">Edit Property</a>
            <a href="" class="bg-red-500 flex-initial w-full py-2 px-8 text-white font-semibold rounded-md mt-4 cursor-default">Delete Property</a>
        </div>


        <h4 class="text-lg font-bold my-3">Reviews</h4>

        @if ($reviews->isNotEmpty())
            <section class="grid grid-cols-2 font-poppins gap-x-6">
                @include('components/review_card')
            </section>
        @else
            <div class="font-poppins text-primary text-xl font-semibold ">
                <h2>No Reviews Yet</h2>
            </div>
        @endif

        
    </div>




    <script>
        const toggleFunc = () => {
            console.log('get clicked');
            const reviewContainers = document.getElementById('reviewContainer');
            const toggleButton = document.getElementById('toggleReview');
            reviewContainers.classList.toggle('hidden');
        }
    </script>

@endsection