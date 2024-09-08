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
            background-image: url('{{ asset('images/property/anju/propertylistBackground.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
    <title>Property Listing</title>
</head>
<body>
    <x-headerbar />
    <x-title-area
        title="Property Listing"
        subtitle="Home - Property Listing"
        image="{{ asset('images/property/anju/propertyHeader.png') }}"
    />

    <!-- Property grid container -->
    <div class="flex flex-wrap items-center justify-center min-h-screen bg-gray-100 p-4">
        @for ($i = 0; $i < 16; $i++)
            <div class="w-full max-w-[387.5px] h-auto bg-[#F9FCFF] p-4 rounded-lg shadow-md m-2">
                <div class="relative w-full h-auto bg-[#F9FCFF] p-4 rounded-lg shadow-md flex items-center justify-center overflow-hidden">
                    <img id="crud-photo"
                        src="{{ asset('images/property/anju/Imageproperty001.png') }}"
                        alt="Uploaded Photo"
                        class="w-full h-auto object-contain">

                    <div class="absolute bottom-0 left-0 p-2 bg-[#ECBD00] bg-opacity-75 rounded-tr-lg hover:bg-opacity-90 transition duration-200">
                        <p class="text-white font-bold">$17,000</p>
                    </div>
                </div>
                <div class="space-y-4 mt-4">
                    <div>
                        <p class="text-[#000000] font-bold text-lg sm:text-xl">Regal Ridge Estates</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <img id="location" src="{{ asset('images/icons/location.png') }}" class="w-[14.4px] h-[18px]">
                        <p class="text-black text-sm sm:text-base">1000 W Redondo Beach Blvd, Gardena, CA</p>
                    </div>
                    <div class="flex flex-wrap justify-between w-full mt-2">
                        <div class="flex items-center space-x-2">
                            <img id="Beds" src="{{ asset('images/icons/bed.png') }}" class="w-[14.4px] h-[18px]">
                            <p class="text-black text-sm sm:text-base">Beds</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <img id="baths" src="{{ asset('images/icons/bathtub.png') }}" class="w-[14.4px] h-[18px]">
                            <p class="text-black text-sm sm:text-base">Baths</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <img id="area" src="{{ asset('images/icons/fullscreen.png') }}" class="w-[14.4px] h-[18px]">
                            <p class="text-black text-sm sm:text-base">1642sq</p>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <x-footer bgimage='images/building/build8.png' />
</body>
</html>
