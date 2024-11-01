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
            background-image: url({{ asset('images/property/anju/propertyDetailBackgroundphoto.png') }});
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
        <x-title-area title="Property Detail" subtitle="Home - Property Detail"
            image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}" />
    </header>

    <!-- Details Section -->
    <main class="flex-grow flex flex-col items-center justify-center">
        <div class="flex flex-col gap-[140px] w-full max-w">
            <!-- Section 1 -->
            <div class="w-[90%] lg:w-[75%]  mx-auto">
                <x-section1  :ad="$ad" :adDetails="$adDetails"/>
            </div>

            <!-- Section 2 -->
            <div class="w-full">
                <x-section2 />
            </div>

            <!-- Section 3 -->
            <div class="w-full flex justify-center">
                <x-section3 />
            </div>

            <!-- Section 4 -->
            <div class="w-full">
                <x-section4 />
            </div>

        </div>

        <div class=" flex flex-col w-full max-w mt-0">

            <!-- Section 5 -->
            <div class="w-full">
                <x-section5 />
            </div>

            <!-- Section 6 -->
            <div class="w-full ">
                <x-section6 />
            </div>

            <!-- Section 7 -->
            <div class="w-full">
                <x-section7 />
            </div>

            <footer>
                <x-footer bgimage='images/building/build8.png' />
            </footer>

        </div>


    </main>


    <!-- Footer Section -->
    <footer class="flex-shrink-0">
        <x-footer bgimage='{{ asset('images/building/build8.png') }}' />
    </footer>
</body>

</html>