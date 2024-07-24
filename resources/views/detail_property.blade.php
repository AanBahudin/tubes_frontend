@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[85%] mx-auto font-poppins">
        @include('components/breadcrumbs', ['url' => '/', 'params' => "Cozy Cabin in Arizona" ])

        <h1 class="text-3xl font-bold">Dream Getaway Awaits You Here</h1>
        <img class="rounded-md my-8 object-bottom object-cover h-[500px] w-full" src="{{ asset('detail_cabin.jpg')}}" alt="">

        <h4 class="font-bold text-lg">Cabin in Arizona</h4>
        <h5>1 bedroom ·0 baths ·2 guests ·0 beds</h5>

        {{-- owner information --}}
        <main class="w-auto flex gap-x-3 border-b border-slate-200 py-4 my-3">
            {{-- profile photo --}}
            <h1 class="text-3xl font-semibold px-4 py-2 rounded-md bg-primary text-white">A</h1>

            {{-- profile information --}}
            <section class="my-auto">
                <h5>Hosted by <span class="font-semibold">Bruce</span></h5>
                <h1 class="text-gray-600">Owner · 2 years hosting</h1>
            </section>
        </main>


        <h4 class="text-lg font-bold my-3">Description</h4>
        <p class="leading-loose">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam reprehenderit dolores asperiores, illum ex, rem reiciendis dignissimos nesciunt nisi consequatur hic totam ad, commodi a non? Porro tempora eaque odio voluptatum aliquid quaerat dicta quisquam similique! Deserunt libero ad, fugit velit ipsa nesciunt hic? Quas, omnis iure? Nam eius, deleniti veritatis eos quaerat esse velit tempore exercitationem aperiam quibusdam facilis cupiditate minus ipsum vel, ducimus quidem expedita similique. Sed ad nulla consequuntur aliquam! Aspernatur soluta reprehenderit architecto, molestiae, blanditiis consectetur harum ducimus eius dolorum veniam voluptate quidem praesentium officia quaerat unde facere ad beatae minima. Sit deleniti consectetur expedita assumenda!</p>

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
        
        <button type="submit" class="bg-primary flex-1 py-2 px-6 text-white font-semibold text-md rounded-md my-8 cursor-default">Leave a Review</button>

        {{-- review container --}}
        <div class="w-full rounded-md py-10 px-8 border border-slate-200 mb-10">

            <label for="rating">Rating</label>
            <select class="block border-2 border-slate-200 px-3 py-1 rounded-md w-1/4 text-sm mt-2 focus:outline-primary placeholder:text-sm" name="rating" id="rating">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>

            <label for="feedback mt-4">Feedback</label>
            <textarea class="border border-slate-200 w-full resize-none p-4 text-sm rounded-md focus:outline-primary mt-2" name="description" id="description" cols="30" rows="5"></textarea>
        </div>
    </div>

@endsection