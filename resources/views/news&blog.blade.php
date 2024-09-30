<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        body {
            background-image: url('{{ asset('images/property/anju/propertyDetailBackgroundphoto.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>Property Detail</title>
</head>
<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 ">
        <x-headerbar />
        <x-title-area
        title="News & Blog"
        subtitle="Home - News & Blog"
        image="{{ asset('images/property/anju/newsblogheader.png') }}"
        />
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-[105px]">
        <div class="flex flex-col w-full max-w">

            <div class=" flex ">
                <!-- Section 01 -->
                <div class=" flex">
                    <!-- Part 01 -->
                    <div class=" flex flex-col">
                        <div class=" flex flex-col bg-white w-[420px] h-[436px] rounded-[4px] mt-[30px]">
                            <div class=" flex mt-[15px] justify-center items-center">
                                <img class=" w-[395px] h-[254px]" src="{{ asset('images/property/anju/newspepar.png') }}" alt="image">
                            </div>
                            <div class=" flex flex-col m-[15px] w-[380px] h-[95px]">
                                <p class=" flex text-[12px] font-bold text-[#ECBD00]">August 12, 2023</p>
                                <p class=" flex text-[18px] font-bold mt-[9px]">Donec interdum diam id nisi rutrum pellent esque. Donec blandit cursus mauris.</p>
                                <p class=" flex text-[13px] mt-[9px]">Ut eleifend mattis ligula, porta finibus urna gravida at. Aenean vehicull</p>
                            </div>
                        </div>
                        <!-- Repeat the same for the other sections -->
                        <div class=" flex flex-col bg-white w-[420px] h-[436px] rounded-[4px] mt-[30px]">
                            <div class=" flex mt-[15px] justify-center items-center">
                                <img class=" w-[395px] h-[254px]" src="{{ asset('images/property/anju/newspepar.png') }}" alt="image">
                            </div>
                            <div class=" flex flex-col m-[15px] w-[380px] h-[95px]">
                                <p class=" flex text-[12px] font-bold text-[#ECBD00]">August 12, 2023</p>
                                <p class=" flex text-[18px] font-bold mt-[9px]">Donec interdum diam id nisi rutrum pellent esque. Donec blandit cursus mauris.</p>
                                <p class=" flex text-[13px] mt-[9px]">Ut eleifend mattis ligula, porta finibus urna gravida at. Aenean vehicull</p>
                            </div>
                        </div>
                        <!-- Repeat for other cards similarly -->
                        <div class=" flex flex-col bg-white w-[420px] h-[436px] rounded-[4px] mt-[30px]">
                            <div class=" flex mt-[15px] justify-center items-center">
                                <img class=" w-[395px] h-[254px]" src="{{ asset('images/property/anju/newspepar.png') }}" alt="image">
                            </div>
                            <div class=" flex flex-col m-[15px] w-[380px] h-[95px]">
                                <p class=" flex text-[12px] font-bold text-[#ECBD00]">August 12, 2023</p>
                                <p class=" flex text-[18px] font-bold mt-[9px]">Donec interdum diam id nisi rutrum pellent esque. Donec blandit cursus mauris.</p>
                                <p class=" flex text-[13px] mt-[9px]">Ut eleifend mattis ligula, porta finibus urna gravida at. Aenean vehicull</p>
                            </div>
                        </div>
                    </div>
                    <!-- Part 02 -->
                    <div class=" flex flex-col ml-[22px]">
                        <div class=" flex flex-col">
                            <div class=" flex flex-col bg-white w-[420px] h-[436px] rounded-[4px] mt-[30px]">
                                <div class=" flex mt-[15px] justify-center items-center">
                                    <img class=" w-[395px] h-[254px]" src="{{ asset('images/property/anju/newspepar.png') }}" alt="image">
                                </div>
                                <div class=" flex flex-col m-[15px] w-[380px] h-[95px]">
                                    <p class=" flex text-[12px] font-bold text-[#ECBD00]">August 12, 2023</p>
                                    <p class=" flex text-[18px] font-bold mt-[9px]">Donec interdum diam id nisi rutrum pellent esque. Donec blandit cursus mauris.</p>
                                    <p class=" flex text-[13px] mt-[9px]">Ut eleifend mattis ligula, porta finibus urna gravida at. Aenean vehicull</p>
                                </div>
                            </div>
                            <!-- Continue similarly for the rest -->
                            <div class=" flex flex-col bg-white w-[420px] h-[436px] rounded-[4px] mt-[30px]">
                                <div class=" flex mt-[15px] justify-center items-center">
                                    <img class=" w-[395px] h-[254px]" src="{{ asset('images/property/anju/newspepar.png') }}" alt="image">
                                </div>
                                <div class=" flex flex-col m-[15px] w-[380px] h-[95px]">
                                    <p class=" flex text-[12px] font-bold text-[#ECBD00]">August 12, 2023</p>
                                    <p class=" flex text-[18px] font-bold mt-[9px]">Donec interdum diam id nisi rutrum pellent esque. Donec blandit cursus mauris.</p>
                                    <p class=" flex text-[13px] mt-[9px]">Ut eleifend mattis ligula, porta finibus urna gravida at. Aenean vehicull</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Section -->
                <div class=" flex flex-col w-[315px] h-auto bg-white mt-[30px] ml-[45px] p-[30px] rounded-[4px]">
                    <div class="flex items-center justify-center">
                        <div class="flex items-center justify-center">
                            <div class="relative flex items-center w-[255px] h-[44px]">
                                <input type="text" placeholder="Search..." class="w-full h-full bg-[#C7D5E1] border-2 border-gray-300 rounded-lg px-4 text-lg focus:outline-none focus:ring-2 focus:ring-[#EAF0F5] pr-10">

                                <!-- Icon inside the search bar -->
                                <button class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <img class="w-[18px] h-[18px]" src="{{ asset('images/property/anju/Icon 03.svg') }}" alt="search icon">
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class=" flex flex-col">
                        <p class=" flex p-5 font-bold text-[24px]">Recent Posts</p>
                        <div class=" flex p-5">
                            <div class="bg-[#868C92] w-[100px] aspect-square rounded-[5px]">
                            </div>
                            <div class=" ml-[40px]">
                                <p class=" text-[10px] text-[#ECBD00] font-bold">August 12, 2023</p>
                                <p class=" text-[10px] font-bold"> Vestibulum congue purus ut lectus feu sollicitu.</p>
                            </div>
                        </div>

                        <div class=" flex p-5">
                            <div class="bg-[#868C92] w-[100px] aspect-square rounded-[5px]">
                            </div>
                            <div class=" ml-[40px]">
                                <p class=" text-[10px] text-[#ECBD00] font-bold">August 12, 2023</p>
                                <p class=" text-[10px] font-bold"> Vestibulum congue purus ut lectus feu sollicitu.</p>
                            </div>
                        </div>

                        <div class=" flex p-5">
                            <div class="bg-[#868C92] w-[100px] aspect-square rounded-[5px]">
                            </div>
                            <div class=" ml-[40px]">
                                <p class=" text-[10px] text-[#ECBD00] font-bold">August 12, 2023</p>
                                <p class=" text-[10px] font-bold"> Vestibulum congue purus ut lectus feu sollicitu.</p>
                            </div>
                        </div>

                        <div class=" flex flex-col mt-[60px] p-5">
                            <div>
                                <p class=" flex font-bold text-[24px]">Tags</p>
                            </div>
                            <div class="flex flex-wrap mt-3">
                                <button class=" w-auto m-1 p-1 bg-[#EAF0F5] rounded-[5px]">Rooftop Terrace</button>
                                <button class=" w-auto m-1 p-1 bg-[#EAF0F5] rounded-[5px]">City Views</button>
                                <button class=" w-auto m-1 p-1 bg-[#EAF0F5] rounded-[5px]">Concept</button>
                                <button class=" w-auto m-1 p-1 bg-[#EAF0F5] rounded-[5px]">Pet Friendly</button>
                                <button class=" w-auto m-1 p-1 bg-[#EAF0F5] rounded-[5px]">EcoFriendly Home</button>
                            </div>

                        </div>
                        <div class=" flex flex-col mt-[60px] p-5">
                            <div>
                                <p class=" flex font-bold text-[24px]">Instagram</p>
                            </div>
                            <div class="flex flex-wrap mt-3">
                                <div class="bg-[#868C92] w-[60px] m-1 aspect-square rounded-[5px]"></div>
                                <div class="bg-[#868C92] w-[60px] m-1 aspect-square rounded-[5px]"></div>
                                <div class="bg-[#868C92] w-[60px] m-1 aspect-square rounded-[5px]"></div>
                                <div class="bg-[#868C92] w-[60px] m-1 aspect-square rounded-[5px]"></div>
                                <div class="bg-[#868C92] w-[60px] m-1 aspect-square rounded-[5px]"></div>
                                <div class="bg-[#868C92] w-[60px] m-1 aspect-square rounded-[5px]"></div>
                            </div>

                        </div>
                        <div class=" w-[250px] m-auto">
                            <img class=" w-[395px]" src="{{ asset('images/property/anju/banner.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>



<footer class=" mt-[119px]">
    <x-footer bgimage='images/building/build8.png' />
</footer>

</body>
</html>
