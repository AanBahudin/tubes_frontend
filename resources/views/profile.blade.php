@extends('layout/main')
@section('content')
    @include('components/navbar')

    <div class="w-[85%] p-4 bg mx-auto font-poppins">
        @include('components/breadcrumbs', ['url' => '/', 'params' => request()->segment(count(request()->segments()))])
        <h1 class="text-3xl font-bold">Your Profile</h1>

        {{-- UPDATE PROFILE SECTION --}}
        <section class="rounded-md w-full my-8 p-10 border border-slate-200">

            <h1 class="py-8 px-10 rounded-md bg-primary text-5xl font-semibold w-fit text-center text-white">A</h1>
            <h5 class="w-fit px-4 py-2 border border-slate-200 text-sm rounded-md my-4">Update Profile Image</h5>

        
            <div class="grid grid-cols-2 gap-x-10 gap-y-5">
                <main class="">
                    <label for="name">Fullname</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="name">
                </main>
                
                <main class="">
                    <label for="email">Email</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="email" name="email">
                </main>

                <main class="">
                    <label for="username">Username</label>
                    <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="username">
                </main>
            </div>

            <button type="submit" class="bg-primary flex-1 py-2 px-6 text-white text-md rounded-md my-8 cursor-default">Update Profile</button>

        </section>
    </div>



@endsection