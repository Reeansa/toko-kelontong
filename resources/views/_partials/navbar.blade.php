<nav class="bg-white ml-52 mr-8 mt-5 p-5">
    <div class="flex items-center justify-end mx-5">
        <h1>selamat datang,
            @auth
                <span class="font-bold">{{ auth()->user()->name }}</span>
            @else
                <span class="font-bold">Pengunjung</span>
            @endauth
        </h1>
    </div>
</nav>
