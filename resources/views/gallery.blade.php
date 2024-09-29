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
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/property/anju/propertylistBackground.png') }}');">
    <!-- Header Section -->
<header class="flex-shrink-0 mb-[140px]">
    <x-headerbar />
    <x-title-area
        title="Gallery"
        subtitle="Home - Gallery"
        image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
    />
</header>

<main class=" flex flex-col p-3 ml-[139px] mr-[139px] mt-[139px]">
    <div class=" flex flex-col gap-[160px]">

        <div class=" w-auto  mx-auto">
            <x-gallerySection1/>
        </div>

    </div>
</main>



<!-- Footer Section -->
<footer>
    <x-footer bgimage='images/building/build8.png' />
</footer>


</body>
</html>
