<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>Property Listing</title>
</head>

<body class="bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('images/property/anju/propertylistBackground.png') }}');">
    <div class="flex flex-col min-h-screen">
        <!-- Header Section -->
        <header>
            <x-headerbar />
            <x-title-area title="Property Listing" subtitle="Home - Property Listing"
                image="{{ asset('images/property/anju/propertyHeader.png') }}" />
        </header>
        @if (!empty($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Details Section -->
        <main class="flex flex-1 items-center justify-center p-4">
            <!-- Property Grid -->
            <section class="flex flex-wrap gap-4 justify-center">
                @foreach ($ads as $ad)
                    <div class="w-full max-w-[387.5px] bg-[#F9FCFF] p-4 rounded-lg shadow-md">
                        <div
                            class="relative bg-[#F9FCFF] p-4 rounded-lg shadow-md flex items-center justify-center overflow-hidden">
                            <img id="crud-photo" src="{{ asset('storage/' . $ad->first_image) }}" alt="{{ $ad->title }}"
                                class="w-full h-auto object-contain">

                            <div
                                class="absolute bottom-0 left-0 p-2 bg-[#ECBD00] bg-opacity-75 rounded-tr-lg hover:bg-opacity-90 transition duration-200">
                                <p class="text-white font-bold">{{ $ad->price }}</p>
                            </div>
                        </div>
                        <div class="space-y-4 mt-4">
                            <p class="text-[#000000] font-bold text-lg sm:text-xl">{{ $ad->title }}</p>
                            <div class="flex items-center space-x-2">
                                <img id="location" src="{{ asset('images/icons/location.png') }}"
                                    class="w-[14.4px] h-[18px]">
                                <p class="text-black text-sm sm:text-base">{{ $ad->location }}</p>
                            </div>
                            <div class="flex flex-wrap justify-between mt-2">
                                <div class="flex items-center space-x-2">
                                    <img id="Beds" src="{{ asset('images/icons/bed.png') }}" class="w-[14.4px] h-[18px]">
                                    <p class="text-black text-sm sm:text-base">{{ $ad->category_name }}</p>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('property.details', $ad->id) }}">
                                        <img id="area" src="{{ asset('images/icons/fullscreen.png') }}"
                                            class="w-[14.4px] h-[18px]">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </main>

        <!-- Footer Section -->
        <footer>
            <x-footer bgimage='images/building/build8.png' />
        </footer>
    </div>
</body>

</html>