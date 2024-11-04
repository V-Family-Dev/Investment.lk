<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>Home 2</title>
</head>

<body>
    <x-headerbar />

    <x-menu-title bgimage="images/building/build2.jpg" />

    <x-content-one bgimage="images/building/build9.png" bigimage="images/property/prop1.png" smallimage="images/property/prop2.png"/>

    {{-- <x-content-two bgimage="images/building/build4.jpg" /> --}}

    <x-image-carousel />

    <x-content-three bgimage="images/building/build9.png" />

    <x-footer bgimage='images/building/build2.jpg' />

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/image-carousel.js') }}"></script>
    <script src="{{ asset('js/card-carousel.js') }}"></script>

</body>

</html>
