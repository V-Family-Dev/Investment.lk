<div class="bg-cover px-2 md:px-20 py-10" style="background-image: url('{{ asset($bgimage) }}')">
    <style>
        .categorybtn.active {
            background-color: rgba(255, 223, 0, 1);
        }
    </style>

    <div class="flex flex-col items-center gap-4">
        <div class="flex flex-col items-center">
            <span class="uppercase text-sm text-accent font-bold">Luxury Villas</span>
            <span class="text-4xl font-bold text-primary">Explore Elevated Living.</span>
        </div>
        <div class="flex items-center justify-center gap-2 flex-wrap">
            <button class="categorybtn active bg-primary p-2 rounded text-black flex items-center">
                <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div> All Properties
            </button>
            <button class="categorybtn bg-primary p-2 rounded text-black flex items-center">
                <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div> For Sale
            </button>
            <button class="categorybtn bg-primary p-2 rounded text-black flex items-center">
                <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div> For Lease
            </button>
            <button class="categorybtn bg-primary p-2 rounded text-black flex items-center">
                <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div> For Rent
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 justify-items-center w-full">

            <div class="bg-primary p-2 rounded-lg w-72">
                <div class="relative">
                    <img src="{{ asset('images/building/build2.jpg') }}" alt="" class="object-cover">
                    <span
                        class="absolute bottom-1 left-1 text-primary font-semibold bg-[#182c5dc9] p-1 rounded-lg">$149.00</span>
                </div>
                <div class="flex flex-col gap-2 py-4">
                    <span class="w-full truncate font-bold">Opulent Oasis Residences</span>
                    <span class="flex gap-1 items-center w-full truncate"><img
                            src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W Redondo
                        Beach Blvd, Gardena, CA</span>
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">4 Beds</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4
                            Baths</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642
                            Sq</span>
                    </div>
                </div>
            </div>
            <div class="bg-primary p-2 rounded-lg w-72">
                <div class="relative">
                    <img src="{{ asset('images/building/build2.jpg') }}" alt="" class="object-cover">
                    <span
                        class="absolute bottom-1 left-1 text-primary font-semibold bg-[#182c5dc9] p-1 rounded-lg">$149.00</span>
                </div>
                <div class="flex flex-col gap-2 py-4">
                    <span class="w-full truncate font-bold">Opulent Oasis Residences</span>
                    <span class="flex gap-1 items-center w-full truncate"><img
                            src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W Redondo
                        Beach Blvd, Gardena, CA</span>
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">4 Beds</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4
                            Baths</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642
                            Sq</span>
                    </div>
                </div>
            </div>
            <div class="bg-primary p-2 rounded-lg w-72">
                <div class="relative">
                    <img src="{{ asset('images/building/build2.jpg') }}" alt="" class="object-cover">
                    <span
                        class="absolute bottom-1 left-1 text-primary font-semibold bg-[#182c5dc9] p-1 rounded-lg">$149.00</span>
                </div>
                <div class="flex flex-col gap-2 py-4">
                    <span class="w-full truncate font-bold">Opulent Oasis Residences</span>
                    <span class="flex gap-1 items-center w-full truncate"><img
                            src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W
                        Redondo Beach Blvd, Gardena, CA</span>
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">4 Beds</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4
                            Baths</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642
                            Sq</span>
                    </div>
                </div>
            </div>
            <div class="bg-primary p-2 rounded-lg w-72">
                <div class="relative">
                    <img src="{{ asset('images/building/build2.jpg') }}" alt="" class="object-cover">
                    <span
                        class="absolute bottom-1 left-1 text-primary font-semibold bg-[#182c5dc9] p-1 rounded-lg">$149.00</span>
                </div>
                <div class="flex flex-col gap-2 py-4">
                    <span class="w-full truncate font-bold">Opulent Oasis Residences</span>
                    <span class="flex gap-1 items-center w-full truncate"><img
                            src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W
                        Redondo Beach Blvd, Gardena, CA</span>
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">4
                            Beds</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4
                            Baths</span>
                        <span class="flex items-center gap-1 p-1 bg-secondary rounded"><img
                                src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642
                            Sq</span>
                    </div>
                </div>
            </div>

        </div>





        <div class="grid grid-cols-1 lg:grid-cols-2 pt-20">

            <div class="flex flex-col gap-4">
                <span class="capitalize text-sm text-accent">Ranch Living</span>
                <span class="text-primary text-4xl font-bold">Green Living: Eco-Friendly Properties for Sustainable
                    Lifestyles.</span>
                <span class="text-base">Ut felis sem, placerat vel sollicitudin ut, mollis non dui. Donec vehicula
                    scelerisque mauris
                    facilis</span>

                <div class="flex flex-col items-center gap-4 w-full pt-8">
                    <div class="bg-primary flex gap-2 rounded-lg p-2 max-w-[500px]">
                        <img src="{{ asset('images/building/build3.jpg') }}" alt="" class="w-[20%] aspect-video m-auto">
                        <div class="flex flex-col justify-center m-auto">
                            <span class="truncate font-bold">Opulent Oasis Residences</span>
                            <span class="flex gap-1 items-center text-ellipsis"><img src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W Redondo Beach Blvd, Gardena, CA</span>
                            <div class="flex justify-between">
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">2 Beds
                                </span>
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4 Baths
                                </span>
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642 Sq
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-primary flex gap-2 rounded-lg p-2 max-w-[500px]">
                        <img src="{{ asset('images/building/build3.jpg') }}" alt="" class="w-[20%] aspect-video m-auto">
                        <div class="flex flex-col justify-center m-auto">
                            <span class="truncate font-bold">Opulent Oasis Residences</span>
                            <span class="flex gap-1 items-center text-ellipsis"><img src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W Redondo Beach Blvd, Gardena, CA</span>
                            <div class="flex justify-between">
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">2 Beds
                                </span>
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4 Baths
                                </span>
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642 Sq
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-primary flex gap-2 rounded-lg p-2 max-w-[500px]">
                        <img src="{{ asset('images/building/build3.jpg') }}" alt="" class="w-[20%] aspect-video m-auto">
                        <div class="flex flex-col justify-center m-auto">
                            <span class="truncate font-bold">Opulent Oasis Residences</span>
                            <span class="flex gap-1 items-center text-ellipsis"><img src="{{ asset('images/icons/location.png') }}" alt="" class="h-4 w-4">1000 W Redondo Beach Blvd, Gardena, CA</span>
                            <div class="flex justify-between">
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/bed.png') }}" alt="" class="h-4 w-4">2 Beds
                                </span>
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/bathtub.png') }}" alt="" class="h-4 w-4">4 Baths
                                </span>
                                <span class="flex items-center gap-1 p-1 bg-secondary rounded text-xs">
                                    <img src="{{ asset('images/icons/fullscreen.png') }}" alt="" class="h-4 w-4">1642 Sq
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            <div class="p-10">
                <div class="w-full max-w-[600px] aspect-square rounded-full bg-cover"
                    style="background-image: url('{{ asset('images/map.png') }}')">
                    <img src="{{ asset('images/mapcover.png') }}" alt="" class="w-full h-full">
                </div>
            </div>
        </div>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const categorybtn = document.querySelectorAll('.categorybtn');

            categorybtn.forEach(link => {
                link.addEventListener('click', () => {
                    categorybtn.forEach(link => link.classList.remove('active'));
                    link.classList.add('active');
                });
            });
        });
    </script>
</div>
