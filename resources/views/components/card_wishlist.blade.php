{{-- CARD CONTAINER --}}

@foreach ($products as $product)
<a class="max-w-[280px] group cursor-default font-poppins pointer-events-auto" href="{{ $role == 'OWNER' ? '/owner/detail/' . $product['productId'] : '/product/' . $product['productId'] }}">
        {{-- IMAGE CONTAINER --}}
        <main class="overflow-hidden">
            <img class="object-cover h-[300px] w-[280px] rounded-md duration-300 ease-in-out group-hover:scale-105" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->nama }}">
        </main>
        
        <h3 class="mt-4 font-bold">{{ $product['nama'] }}</h3>
        <h5 class="text-sm text-slate-700 mt-2 text-nowrap">{{ $product['tagline'] }}</h5>
        
        <main class="w-full flex justify-between mt-2">
            <p>$ {{ $product['price'] }} night</p>
            <p>{{ $product['country'] }}</p>
        </main>
    </a>
@endforeach