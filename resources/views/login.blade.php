@extends('layout/main')
@section('content')
    @include('components/navbar')
    
    <div class="h-full max-w-full flex justify-center align-center font-poppins">
        {{-- form container --}}
        <section class="w-fullSize h-full px-14 py-8 flex justify-center gap-x-40">

            <main class="w-fit flex flex-col h-full my-auto">
                <h1 class="text-2xl font-semibold mb-3">JOIN FOR FREE</h1>
                <h5 class="text-4xl font-semibold leading-relaxed mb-5">Unleash the traveler <br><span class="text-primary">inside YOU</span>, Enjoy your<br> dream Vacation</h5>
                <p class="text-sm mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                <button class="px-7 py-2 border grow-0 border-primary bg-white text-primary rounded-md ease-in-out duration-150 hover:shadow-lg cursor-default">Explore</button>
            </main>

            <main class="flex-1">
                <h1 class="text-3xl font-semibold text-[#1D1C1B] mb-7">Welcome <br> Back Traveller !</h1>
                <form class="flex flex-col items-start " action="/auth/login" method="post">
                    @csrf
                    
                    {{-- EMAIL --}}
                    <div class="flex w-full flex-col mt-4">
                        <label for="email" class="text-sm">Email</label>
                        <input class="block border-2 border-slate-100 px-3 py-1 rounded-md text-sm w-full mt-2 focus:outline-primary placeholder:text-sm" type="email" placeholder="johndoe@gmail.com" name="email" required autofocus autocomplete="off">
                    </div>

                    {{-- PASSWORD --}}
                    <div class="flex w-full flex-col mt-4">
                        <label for="password" class="text-sm">Password</label>
                        <input id="passwordInput" class="block border-2 border-slate-100 px-3 py-1 text-sm rounded-md w-full mt-2 focus:outline-primary" type="password" placeholder="******" name="password" required>
                    </div>
                    
                    {{-- SHOW PASSWORD CHECKBOX --}}
                    <div class="flex gap-x-4 mt-2">
                        <input class="block" type="checkbox" name="showPassword" id="showPassword">
                        <label id="showPassword" class="text-sm" for="showPassword" onchange="showPasswordfunc()">Show Password</label>
                    </div>

                    <button type="submit" class="bg-primary flex-1 w-full py-2 px-8 text-white font-semibold rounded-md mt-4 cursor-default">LOGIN</button>

                </form>
                <h3 class="text-center my-4 font-semibold text-sm">Don't have an account? <a href="/register" class="text-primary text-center">Register here</a></h3>
            </main>
        </section>
    </div>


    <script>
        const userRole = document.getElementById("traveller");
        const ownerPropertyRole = document.getElementById("ownerProperty");
        const descriptionRole = document.getElementById("descriptionRole");
        const userRoleInput = document.getElementById('roleInput')

        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('passwordInput');

        userRole.classList.add('border', 'border-primary');
        descriptionRole.textContent = "you can select property to stay";
        userRoleInput.value = "USER";

        const travellerClick = () => {
            userRole.addEventListener('click', function(event) {
                ownerPropertyRole.classList.remove('border-primary')
                userRole.classList.add('border', 'border-primary');
                userRoleInput.value = "USER";
                descriptionRole.textContent = "you can select property to stay";

            })
        }

        const propertyOwner = () => {
            ownerPropertyRole.addEventListener('click', function(event) {
                userRole.classList.remove('border-primary');
                ownerPropertyRole.classList.add('border', 'border-primary');
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