@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[85%] p-4 bg mx-auto font-poppins">
        @include('components/breadcrumbs', ['url' => '/', 'params' => request()->segment(count(request()->segments()))])
        <h1 class="text-3xl font-bold">Your Profile</h1>

        @if (session()->has('success'))
            <main id="notifBar" class="w-full bg-green-400 text-center p-2 rounded-md shadow-lg" onclick="toggleNotif()">
                <h1 class="font-medium text-white">{{session('success')}}</h1>
            </main>
        @endif

        {{-- UPDATE PROFILE SECTION --}}
        <form action="/profile/update/{{ $user_id }}" method="POST" enctype="multipart/form-data" class="rounded-md w-full my-8 p-10 border border-slate-200">
            @csrf

            @if ($user->image) 
                <img class="w-36 h-36 object-cover rounded-md" src="{{ asset('storage/' . $user->image) }}" alt="">
            @else
                <img class="w-36 h-36 object-cover rounded-md" alt="">
            @endif


        
            <div class="grid grid-cols-2 gap-x-10 gap-y-5 my-6">
                <main class="">
                    <label for="name">Fullname</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="nama" value="{{ $user['nama'] }}">
                </main>
                
                <main class="">
                    <label for="email">Email</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="email" name="email" value="{{ $user['email'] }}">
                </main>

                <main class="">
                    <label for="username">Username</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="username" value="{{ $user['username'] }}">
                </main>

                <main class="">
                    <label for="profile_image">Profile Image</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="file" name="image">
                </main>
            </div>

            <button type="submit" class="bg-primary flex-1 py-2 px-6 text-white text-md rounded-md my-3 cursor-default">Update Profile</button>

        </form>
    </div>



@endsection