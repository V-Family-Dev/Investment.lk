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
<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
<header class="flex-shrink-0 mb-[140px]">
    <x-headerbar />
    <x-title-area
        title="Property Detail"
        subtitle="Home - Property Detail"
        image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
    />
</header>

<!-- Details Section -->
<main class="flex-grow flex items-center justify-center">
    <div class="flex flex-col gap-[140px] w-full max-w">
        <!-- Section 1 -->
        <div class="w-[85%]  mx-auto">
            <x-section1/>
        </div>

        <!-- Section 2 -->
        <div class="w-full h-[10%]">
            <x-section2/>
        </div>

        <!-- Section 3 -->
        <div class="w-full h-[10%]">
            <x-section3/>
        </div>

        <!-- Section 4 -->
        <div class="w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Photos</h2>
            <p class="text-lg">Gallery of images showcasing the property.</p>
        </div>

        <!-- Section 5 -->
        <div class="w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Pricing</h2>
            <p class="text-lg">Information about the price and any available financing options.</p>
        </div>

        <!-- Section 6 -->
        <div class="w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Contact Information</h2>
            <p class="text-lg">Details on how to get in touch for more information or to schedule a visit.</p>
        </div>

        <!-- Section 7 -->
        <div class="w-full bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Reviews</h2>
            <p class="text-lg">User reviews and testimonials about the property.</p>
        </div>
    </div>
</main>


    <!-- Footer Section -->
    <footer class="flex-shrink-0">
        <x-footer bgimage='{{ asset('images/building/build8.png') }}' />
    </footer>
</body>
</html>
