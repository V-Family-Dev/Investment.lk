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
    <title>Bungalow Sale</title>
</head>
<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->
<header class="flex-shrink-0 mb-[140px]">
    <x-headerbar />
    <x-title-area
    title="Colonia Style Bungalow Sale Form"
    subtitle="Home - Bungalow Sale"
    image="{{ asset('images/property/anju/bungalowSale.png') }}"
    />
</header>

<main class="flex-grow flex flex-col items-center justify-center">
    <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-black mb-4">update Colonia Style Bungalow Sale Form</h2>
        <form class="space-y-4"action="{{ route('colonia_sales.update',$bungalow_sale->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="text" value="{{ old('title', $bungalow_sale->title) }}" name="title" placeholder="Title" class="w-full p-3 border border-gray-300 rounded" required>
            <input type="text" value="{{ old('location', $bungalow_sale->location) }}" name="location"placeholder="Location / Address" class="w-full p-3 border border-gray-300 rounded" required>
            <input type="number" value="{{ old('bedrooms', $bungalow_sale->bedrooms) }}" name="bedrooms"placeholder="Bedrooms" class="w-full p-3 border border-gray-300 rounded" required>
            <input type="number" value="{{ old('bathrooms', $bungalow_sale->bathrooms) }}" name="bathrooms"placeholder="Bathrooms" class="w-full p-3 border border-gray-300 rounded" required>
            <input type="text" value="{{ old('house_size', $bungalow_sale->house_size) }}" name="house_size"placeholder="House Size" class="w-full p-3 border border-gray-300 rounded" required>
            <input type="text" value="{{ old('land_size', $bungalow_sale->land_size) }}" name="land_size"placeholder="Land Size" class="w-full p-3 border border-gray-300 rounded" required>
            <input type="number" value="{{ old('price', $bungalow_sale->price) }}" name="price"placeholder="Price" class="w-full p-3 border border-gray-300 rounded" required>
            <textarea name="description"placeholder="Description" class="w-full p-3 border border-gray-300 rounded" required>{{ old('descriptionv', $bungalow_sale->description) }}</textarea>
            <input type="file"name="image[]" class="w-full border border-gray-300 rounded" multiple>
            <input type="text" value="{{ old('contact_details', $bungalow_sale->contact_details) }}" name="contact_details"placeholder="Contact Details" class="w-full p-3 border border-gray-300 rounded" required>
            <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded">Submit</button>
        </form>
    </div>
</main>


<footer class=" mt-[119px]">
    <x-footer bgimage='images/building/build8.png' />
</footer>



</body>
</html>
