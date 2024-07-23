<nav class="flex w-fullSize mx-auto px-10 py-6 font-poppins justify-between">

    {{-- LOGO --}}
    <section class="bg-primary p-1 rounded-md shadow-md h-fit my-auto">
        <a href="/" class="cursor-default">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-10 h-10 stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
            </svg>      
        </a>
    </section>

    {{-- SEARCH INPUT --}}
    <div class="justify-between flex py-3 px-6 space-x-6 w-3/12">
        <form action="" class="w-full mx-w-md">
            <div class="relative flex items-center text-gray-400 focus-within:text">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 absolute ml-3 pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input class="w-full pr-3 pl-10 py-2 bg-gray-50 rounded-md outline-none border-2 focus:border-primary focus:shadow-xl placeholder:text-sm text-slate-800 text-sm ease-in-out duration-300" type="text" autocomplete="off" placeholder="Sunset Resort">
            </div>
        </form>
    </div>

    {{-- LOGIN & REGISTER BUTTON --}}
    <section class="my-auto relative ease-in-out duration-300" id="toggle-btn" onclick="tonggleDropdown()">
        <div class="flex gap-x-4 border-2 py-1 px-3 rounded-md" onclick="tonggleDropdown()" id="btnWrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 stroke-primary">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
              
        </div>

        <div class="absolute z-999 bg-slate-100 w-[180px] mt-3 py-2 px-1 text-md rounded-md border-2 flex flex-col gap-y-3 hidden ease-in-out duration-300" id="toggle-menu">
            <h2 class="rounded-md text-sm py-1 px-2 cursor-default flex gap-x-3 {{ $isLoggedIn ? 'visible' : 'hidden' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 stroke-primary my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span>{{ $username }}</span>
            </h2>
            <a class="w-full {{$isLoggedIn ? 'hidden' : 'visible'}} rounded-md text-sm hover:bg-slate-200 py-1 px-2 cursor-pointer" href="/login">Login</a>
            <a class="w-full {{$isLoggedIn ? 'hidden' : 'visible'}} rounded-md text-sm hover:bg-slate-200 py-1 px-2 cursor-pointer" href="/register">Register</a>

            <a class="w-full {{$isLoggedIn == TRUE && $role == 'USER' ? 'visible' : 'hidden'}} rounded-md text-sm hover:bg-slate-200 py-1 px-2 cursor-pointer" href="/wishlist">Wishlist</a>
            <a class="w-full {{$isLoggedIn ? 'visible' : 'hidden'}} rounded-md text-sm hover:bg-slate-200 py-1 px-2 cursor-pointer" href="/wishlist">Add Property</a>
            <a class="w-full {{$isLoggedIn ? 'visible' : 'hidden'}} rounded-md text-sm hover:bg-slate-200 py-1 px-2 cursor-pointer" href="/profile">Profile</a>
            <a class="w-full {{$isLoggedIn ? 'visible' : 'hidden'}} rounded-md text-sm hover:bg-slate-200 py-1 px-2 cursor-pointer" href="/auth/logout">Logout</a>
        </div>
    </section>
</nav>

<hr class="w-full">

<script>

    document.addEventListener('click', function(event) {
    const toggleButton = document.getElementById('toggle-btn');
    const toggleMenu = document.getElementById('toggle-menu');
    const btnWrapper = document.getElementById('btnWrapper');

    const isClickInside = toggleButton.contains(event.target);

        if (!isClickInside) {
            toggleMenu.classList.add("hidden");
            btnWrapper.classList.remove('border-primary');
            btnWrapper.classList.remove('shadow-xl');
        }
    });

    const toggleDropdown = () => {
        const toggleButton = document.getElementById('toggle-btn');
        const toggleMenu = document.getElementById('toggle-menu');
        const btnWrapper = document.getElementById('btnWrapper');

        toggleButton.addEventListener('click', function(event) {
            event.stopPropagation();
            btnWrapper.classList.toggle('border-primary');
            btnWrapper.classList.toggle('shadow-xl');
            toggleMenu.classList.toggle("hidden");
        });
    };

    toggleDropdown();


   
</script>