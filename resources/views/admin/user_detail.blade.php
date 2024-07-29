@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[85%] p-4 bg mx-auto font-poppins">
        @include('components/breadcrumbs', ['url' => '/admin/dashboard', 'params' => "Detail User"])
        <h1 class="text-3xl font-bold">Your Profile</h1>

        {{-- UPDATE PROFILE SECTION --}}
        <div class="rounded-md w-full my-8 p-10 border border-slate-200">
            {{-- @csrf --}}

            @if ($user->image) 
                <img class="w-36 h-36 object-cover rounded-md" src="{{ asset('storage/' . $user->image) }}" alt="">
            @else
                <img class="w-36 h-36 object-cover rounded-md" alt="">
            @endif


        
            <div class="grid grid-cols-2 gap-x-10 gap-y-5 my-6">
                <main class="">
                    <label for="name">Fullname</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="nama" disabled value="{{ $user['nama'] }}">
                </main>
                
                <main class="">
                    <label for="email">Email</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="email" name="email" disabled value="{{ $user['email'] }}">
                </main>

                <main class="">
                    <label for="username">Username</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="username" disabled value="{{ $user['username'] }}">
                </main>
            </div>

            <a href="/admin/delete/user/{{ $user->id }}" class="bg-primary flex-1 py-2 px-6 text-white text-md rounded-md my-3 cursor-default">Delete Profile</a>

        </div>
    </div>



@endsection