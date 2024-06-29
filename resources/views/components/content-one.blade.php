<div class="bg-cover p-0 lg:px-20 py-8 bg-center" style="background-image: url('{{ asset($bgimage) }}')">
    <x-card-carousel />

    <div class="grid grid-cols-1 md:grid-cols-2 justify-items-center pt-28">

        <div class="relative flex flex-col justify-center max-w-[750px]  px-10">
            <img src="{{ asset($smallimage) }}" alt="" class="absolute -top-12 right-10 h-44 w-80 rounded-md">
            <img src="{{ asset($bigimage) }}" alt="" class="w-full h-full rounded-md">
            <div class="relative -top-24 left-4 w-44 flex flex-col justify-center items-center p-3 rounded-md bg-black bg-opacity-75">
                <div class="flex">
                    <div class="absolute left-4 rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                    <div class="absolute left-10 rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                    <div class="relative rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                    <div class="absolute right-10 rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                    <div class="absolute right-4 rounded-full h-10 w-10 bg-yellow-500 border-2 flex justify-center items-center"><span class="text-primary">69+</span></div>
                </div>
                <span class="text-primary text-xs">Top Rated around globe</span>
            </div>
        </div>



        <div class="flex flex-col justify-center gap-2 px-10 p-6 max-w-[750px]">
            <span class="uppercase text-accent text-sm font-bold">Stylish Living</span>
            <span class="text-4xl font-bold">Your Sanctuary in the City: Where Urban Convenience Meets Serenity.</span>

            <span>Ut felis sem, placerat vel sollicitudin ut, mollis non dui. Donec vehicula scelerisque mauris
                facilisis rutrum. Quisque eu pellentesque erat, eget bibendum ipsum. Cras euismod massa sed lacus
                lacinia, quis porta libero consectetur. In pulvinar lobortis eros vitae dapibus. Vestibu</span>

            <div class="grid grid-cols-1 xl:grid-cols-2 mt-2">
                <div>
                    <span class="flex items-center gap-1"><img src="{{ asset('images/icons/check.png') }}"
                            class="h-4 w-4">Ut felis sem, placerat vel</span>
                    <span class="flex items-center gap-1"><img src="{{ asset('images/icons/check.png') }}"
                            class="h-4 w-4">Sollicitudin ut, mollis non dui.</span>
                    <span class="flex items-center gap-1"><img src="{{ asset('images/icons/check.png') }}"
                            class="h-4 w-4">Suspendisse vitae lacinia nibh.</span>
                </div>
                <div>
                    <span class="flex items-center gap-1"><img src="{{ asset('images/icons/check.png') }}"
                            class="h-4 w-4">Ut felis sem, placerat vel</span>
                    <span class="flex items-center gap-1"><img src="{{ asset('images/icons/check.png') }}"
                            class="h-4 w-4">Sollicitudin ut, mollis non dui.</span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <button class="px-3 py-2 rounded-lg text-darkblue bg-accent active:translate-y-[1px] active:bg-yellow-400">Search property</button>
                <button class="px-3 py-2 rounded-lg text-darkblue bg-accent active:translate-y-[1px] active:bg-yellow-400">Contact Us</button>
            </div>
        </div>
    </div>

</div>
