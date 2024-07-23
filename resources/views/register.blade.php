@extends('layout/main')
@section('content')

    @include('components/navbar')
        
    <div class="max-h-full max-w-full flex justify-center align-center font-poppins">
        {{-- form container --}}
        <section class="w-fullSize h-full px-14 py-8 flex justify-center gap-x-40 align-middle">

            <main class="w-fit flex flex-col h-full my-auto">
                <h1 class="text-2xl font-semibold mb-3">JOIN FOR FREE</h1>
                <h5 class="text-4xl font-semibold leading-relaxed mb-5">Unleash the traveler <br><span class="text-primary">inside YOU</span>, Enjoy your<br> dream Vacation</h5>
                <p class="text-sm mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <button class="px-7 py-2 border border-primary bg-white text-primary rounded-md ease-in-out duration-150 hover:shadow-lg cursor-default">Explore</button>
            </main>

            <main class="flex-1">
                <h1 class="text-3xl font-semibold text-[#1D1C1B] mb-7">Create <br> New Account</h1>
                <form class="flex flex-col items-start " action="/auth/register" method="post">
                    @csrf

                    <div class="flex w-full flex-col mt-4">
                        <label for="firstname" class="text-sm">Fullname</label>
                        <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="John Doe" type="text" name="nama" required autofocus>
                    </div>

                    {{-- 2 COLUMN INPUT --}}
                    <div class="flex w-full gap-x-4 mt-4">
                        <section class="flex-1">
                            <label for="username" class="text-sm">Username</label>
                            <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="johndoe" type="text" name="username" required>
                        </section>

                        <section class="flex-1">
                            <label for="email" class="text-sm">Email</label>
                            <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full text-sm mt-2 focus:outline-primary placeholder:text-sm" placeholder="johndoe@gmail.com" type="email" name="email" required>
                        </section>
                    </div>

                    <h4 class="mt-4 text-sm select-text">* How you want to use this app</h4>

                    {{-- ROLE PICK --}}
                    <div class="flex w-full mt-2">
                        <main class="flex flex-col justify-center text-center w-32 h-32 border rounded-md mr-10" id="traveller" onclick="travellerClick()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 mx-auto mb-2 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <h5 class="text-sm pointer-events-none">Traveller</h5>
                        </main>

                        <main class="flex flex-col justify-center text-center w-32 h-32 border rounded-md mr-10" id="ownerProperty" onclick="propertyOwner()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 mx-auto mb-2 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>                              
                            <h5 class="text-sm pointer-events-none">Property Owner</h5>
                        </main>

                        <main class="flex flex-1 flex-col justify-start text-start text-[13px] p-2 w-32 h-32 bg-slate-100 rounded-md" id="roleDescription">
                            <p id="descriptionRole" class="italic text-slate-500"></p>
                        </main>

                        <input type="hidden" name="role" id="roleInput">
                    </div>

                    {{-- PASSWORD --}}
                    <div class="flex w-full flex-col mt-4">
                        <label for="password" class="text-sm">Password</label>
                        <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full mt-2 focus:outline-primary" id="passwordInput" type="password" placeholder="******" name="password" required>
                    </div>

                    
                    {{-- CONFIRM PASSWORD --}}
                    {{-- <div class="flex w-full flex-col mt-4">
                        <label for="confirm_pass" class="text-sm">Confirm Password</label>
                        <input class="block border-2 border-slate-100 px-3 py-1 rounded-md w-full mt-2 focus:outline-primary" type="password" placeholder="******" name="confirm_pass" required>
                    </div> --}}
                    
                    {{-- SHOW PASSWORD CHECKBOX --}}
                    <div class="flex gap-x-4 mt-2">
                        <input id="showPassword" class="block" type="checkbox" name="showPassword" id="showPassword" onchange="showPasswordfunc()">
                        <label class="text-sm" for="showPassword">Show Password</label>
                    </div>

                    <button type="submit" class="bg-primary flex-1 w-full py-2 px-8 text-white font-semibold rounded-md mt-4 cursor-default">Create Account</button>

                </form>
            </main>
        </section>
    </div>

    <script>
        const userRole = document.getElementById("traveller");
        const ownerPropertyRole = document.getElementById("ownerProperty");
        const descriptionRole = document.getElementById("descriptionRole");
        const userRoleInput = document.getElementById('roleInput')

        // password
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('passwordInput');



        userRole.classList.add('border', 'border-primary', 'shadow-xl');
        descriptionRole.textContent = "you can select property to stay";
        userRoleInput.value = "USER";

        const travellerClick = () => {
            userRole.addEventListener('click', function(event) {
                ownerPropertyRole.classList.remove('border-primary', 'shadow-xl')
                userRole.classList.add('border', 'border-primary', 'shadow-xl');
                userRoleInput.value = "USER";
                descriptionRole.textContent = "you can select property to stay";

            })
        }

        const propertyOwner = () => {
            ownerPropertyRole.addEventListener('click', function(event) {
                userRole.classList.remove('border-primary', 'shadow-xl');
                ownerPropertyRole.classList.add('border', 'border-primary', 'shadow-xl');
                userRoleInput.value = "OWNER";
                descriptionRole.textContent = "you can enlist your property so traveller can stay in your place";
            })
        }

        const showPasswordfunc = () => {
            showPasswordCheckbox.addEventListener('change', function(event) {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = 'text'
                } else {
                    passwordInput.type = 'password'
                }
            })
        }
        

    </script>
    
@endsection