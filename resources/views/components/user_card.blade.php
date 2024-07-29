<div class="w-fullSize grid grid-cols-4  gap-x-1 gap-y-5 p-3 rounded-md mx-auto">

    @foreach ($users as $user)
        <a href="{{'/admin/users/' . $user->id}}" class="justify-self-auto font-poppins flex justify-between w-fit border-2 self-stretch border-slate-200 gap-x-10 p-5 rounded-md hover:shadow-lg duration-150 ease-in-out">
            <img class="w-14 h-14 object-cover rounded-full" src="{{ asset('storage/' . $user->image) }}" alt="">
            
            <div>
                <h1>{{$user->nama}}</h1>
                <p class="text-sm mt-2">{{$user->email}}</p>
            </div>
        </a>
    @endforeach

</div>