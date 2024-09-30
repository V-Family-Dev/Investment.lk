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
<header class="flex-shrink-0 mb-[140px]">
    <x-headerbar />
    <x-title-area
    title="Gallery"
    subtitle="Home - Gallery"
    image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
    />
</header>

<main class="flex-grow flex flex-col items-center justify-center">
    <div class="flex flex-col gap-[140px] w-full max-w">
        <!-- Section 1 -->
        <div class="w-[85%]  mx-auto">
            <x-gallerySection1/>
        </div>

        <!-- Section 2 -->
        <div class="w-full h-[10%]">
            <x-gallerySection2/>
        </div>


    </div>

   </div>

</main>


<footer class=" mt-[119px]">
    <x-footer bgimage='images/building/build8.png' />
</footer>



</body>
</html>
