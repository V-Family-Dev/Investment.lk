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
        title="News & Blog - Detail"
        subtitle="Home - News & Blog - Detail"
        image="{{ asset('images/property/anju/cars09.png') }}"
        />
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-[105px]">
        <div class="flex flex-col w-full max-w">

            <div class=" flex">
                <!-- Section 01 -->
                <div class=" flex flex-col w-max bg-transparent p-[30px] ">
                    <!-- Title Photo -->
                    <div>
                        <img class=" w-auto" src="{{ asset('images/property/anju/cars004.png') }}" alt="image">
                    </div>
                    <!-- Pharagraph 01 -->
                    <div class=" mt-[60px]">

                        <p class=" flex text-[15px] text-[#EC6325] font-bold">
                            August 12, 2023
                        </p>

                        <p class=" flex flex-wrap w-auto text-[30px] font-bold mt-[18px]">
                            Aliquam justo risus, aliquet ut lorem non, ullamcorper dictum nibh. Aliquam lacus eros, venenatis et venenatis
                        </p>

                        <p class=" flex flex-wrap w-auto mt-[18px]">
                            Duis imperdiet purus eget tortor ornare, quis malesuada dui pharetra. In quis mauris facilisis, pulvinar felis ac, molestie ligula. Mauris lacus massa, facilisis ac lacus ac, condimentum vulputate est. Vestibulum sit amet felis eu dui accumsan lacinia eget sed orci. Cras et ipsum lorem. Morbi velit magna, malesuada non mattis sed, iaculis id urna. Nam mattis, purus ac rutrum rutrum, felis ipsum dictum massa, et pharetra metus nibh et arcu. Maecenas quis laoreet sapien. Morbi sit amet accumsan lorem. Sed sed justo eget elit scelerisque iaculis ut quis erat. Sed eu laoreet diam, vitae vehicula tellus. Nulla at nibh elit. Ut accumsan, diam eget lacinia ultricies, nibh massa condimentum felis, maximus sollicitudin erat est nec massa. Aenean sit amet ultricies sem.
                        </p>
                    </div>
                    <!-- Pharagraph 02 -->
                    <div>
                        <p class=" flex flex-grow font-bold text-[20px]">Donec a tellus id felis eleifend dictum sed a urna aecenas</p>
                        <p class=" flex flex-grow">Mauris mollis tellus sed ex aliquam, quis vulputate mauris aliquet. Duis facilisis, justo a tempus luctus, risus ex vestibulum nibh, vitae euismod velit nisl at purus. Vivamus pellentesque justo nec nisl fermentum tempus. Pellentesque sodales, mauris ac mattis venenatis, nulla leo ornare magna, rhoncus commodo elit orci id mi. Quisque eget vehicula massa. Etiam bibendum lorem et blandit ultricies. Etiam et hendrerit dui. Nam id condimentum arcu.</p>
                        <div class=" flex">
                            <img class=" w-auto p-2" src="{{ asset('images/property/anju/car0006.png') }}" alt="image">
                            <p class=" flex flex-grow ml-1">Duis imperdiet purus eget tortor ornare, quis malesuada dui pharetra.
                                In quis mauris facilisis, pulvinar felis ac, molestie ligula. Mauris lacus massa, facilisis ac
                                lacus ac, condimentum vulputate est. Vestibulum sit amet felis eu dui accumsan
                                lacinia eget sed orci. Cras et ipsum lorem. Morbi velit magna, malesuada non mattis
                                sed, iaculis id urna. Nam mattis, purus ac rutrum rutrum, felis ipsum
                                dictum massa, et pharetra metus nibh et arcu. Maecenas quis laoreet sapien.
                                Morbi sit amet accumsan lorem. Sed sed justo eget elit scelerisque iaculis ut quis erat.</p>
                        </div>
                    </div>

                    <!-- Pharagraph 03 -->
                    <div class=" flex flex-grow">
                        <div class=" flex flex-col flex-grow">
                            <p class=" flex flex-grow font-bold text-[20px]">Donec a tellus id felis eleifend dictum sed a urna aecenas</p>
                            <p class=" flex flex-grow ml-1">Duis imperdiet purus eget tortor ornare, quis malesuada dui pharetra.
                            In quis mauris facilisis, pulvinar felis ac, molestie ligula. Mauris lacus massa, facilisis ac
                            lacus ac, condimentum vulputate est. Vestibulum sit amet felis eu dui accumsan
                            lacinia eget sed orci. Cras et ipsum lorem. Morbi velit magna, malesuada non mattis
                            sed, iaculis id urna. Nam mattis, purus ac rutrum rutrum, felis ipsum
                            dictum massa, et pharetra metus nibh et arcu. Maecenas quis laoreet sapien.
                            Morbi sit amet accumsan lorem. Sed sed justo eget elit scelerisque iaculis ut quis erat.</p>
                        </div>
                        <img class=" w-auto p-2" src="{{ asset('images/property/anju/car0006.png') }}" alt="image">
                    </div>
                    <!-- Pharagraph 04 -->
                    <div>
                        <p class=" flex flex-grow font-bold text-[20px]">Donec a tellus id felis eleifend dictum sed a urna aecenas</p>
                        <p class=" flex flex-grow">Mauris mollis tellus sed ex aliquam, quis vulputate mauris aliquet. Duis facilisis, justo a tempus luctus, risus ex vestibulum nibh, vitae euismod velit nisl at purus. Vivamus pellentesque justo nec nisl fermentum tempus. Pellentesque sodales, mauris ac mattis venenatis, nulla leo ornare magna, rhoncus commodo elit orci id mi. Quisque eget vehicula massa. Etiam bibendum lorem et blandit ultricies. Etiam et hendrerit dui. Nam id condimentum arcu.</p>
                    </div>

                    <div class="flex flex-wrap mt-[51px]">
                        <button class=" w-auto m-1 p-3 bg-[#EAF0F5] rounded-[5px]">Rooftop Terrace</button>
                        <button class=" w-auto m-1 p-3 bg-[#EAF0F5] rounded-[5px]">City Views</button>
                        <button class=" w-auto m-1 p-3 bg-[#EAF0F5] rounded-[5px]">Concept</button>
                    </div>

                    <div class=" flex flex-col mt-7">
                        <p class=" flex flex-grow text-[#EC6325]">Your Opinions</p>

                        <p class=" flex flex-grow font-bold text-[20px]">Let's Create Community Conversations!</p>

                    </div>
                    <div class="flex w-full mx-auto bg-[#F9FCFF] p-6 mt-7 rounded-lg shadow-md">

                        <!-- Left Column (Name, Email, Mobile) -->
                        <div class="flex flex-col w-1/2 pr-4">
                            <!-- Name Input -->
                            <label for="name" class="mb-2 text-[#C7D5E1]">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Enter your name"
                                required
                                class="p-2 mb-4 border border-[#C7D5E1] rounded-md focus:outline-none focus:ring-2 focus:ring-[#C7D5E1] bg-white"
                            />

                            <!-- Email Input -->
                            <label for="email" class="mb-2 text-[#C7D5E1]">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                required
                                class="p-2 mb-4 border border-[#C7D5E1] rounded-md focus:outline-none focus:ring-2 focus:ring-[#C7D5E1] bg-white"
                            />

                            <!-- Mobile Input -->
                            <label for="mobile" class="mb-2 text-[#C7D5E1]">Mobile Number</label>
                            <input
                                type="tel"
                                id="mobile"
                                name="mobile"
                                placeholder="Enter your mobile number"
                                required pattern="[0-9]{10}"
                                class="p-2 mb-4 border border-[#C7D5E1] rounded-md focus:outline-none focus:ring-2 focus:ring-[#C7D5E1] bg-white"
                            />
                            <small class="mb-4 text-xs text-[#C7D5E1]">Format: 10 digits, e.g., 1234567890</small>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="p-3 bg-[#C7D5E1] text-[#F9FCFF] font-bold rounded-md hover:bg-[#A0B5C7] focus:outline-none mt-4"
                            >
                                Submit
                            </button>
                        </div>

                        <!-- Right Column (Additional Message) -->
                        <div class="flex flex-col w-1/2 pl-4">
                            <!-- Additional Message -->
                            <label for="message" class="mb-2 text-[#C7D5E1]">Additional Message</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="7"
                                placeholder="Enter additional message"
                                class="p-2 mb-4 border border-[#C7D5E1] rounded-md focus:outline-none focus:ring-2 focus:ring-[#C7D5E1] bg-white"
                            ></textarea>
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
                            <img class=" w-[395px]" src="{{ asset('images/property/anju/banner01.png') }}" alt="image">
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
