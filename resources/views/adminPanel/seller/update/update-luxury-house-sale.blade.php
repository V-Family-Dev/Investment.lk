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
        title="Luxury House Sale Form"
        subtitle="Home - Luxury House Sale"
        image="{{ asset('images/property/anju/newsblogheader.png') }}"
        />
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-[105px]">
        <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-black mb-4">update Luxury House Sale Form</h2>
            <form class="space-y-4" action="{{ route('luxury-houses.update',$luxury_house->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="text" value="{{ old('title', $luxury_house->title) }}" name="title" placeholder="Title" class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text"value="{{ old('location', $luxury_house->location) }}" name="location" placeholder="Location / Address" class="w-full p-3 border border-gray-300 rounded" required>
                <input type="number" value="{{ old('bedrooms', $luxury_house->bedrooms) }}" name="bedrooms" placeholder="Bedrooms" class="w-full p-3 border border-gray-300 rounded" required>
                <input type="number" value="{{ old('bathrooms', $luxury_house->bathrooms) }}" name="bathrooms" placeholder="Bathrooms" class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" value="{{ old('house_size', $luxury_house->house_size) }}" name="house_size" placeholder="House Size" class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" value="{{ old('land_size', $luxury_house->land_size) }}" name="land_size" placeholder="Land Size" class="w-full p-3 border border-gray-300 rounded" required>
                <input type="number" value="{{ old('price', $luxury_house->price) }}" name="price" placeholder="Price" class="w-full p-3 border border-gray-300 rounded" required>
                <textarea  placeholder="Description" name="description" class="w-full p-3 border border-gray-300 rounded" required>{{ old('description', $luxury_house->description) }}</textarea>
                <input type="file" name="image[]" class="w-full border border-gray-300 rounded" multiple>
                <input type="text" value="{{ old('contact_details', $luxury_house->contact_details) }}" name="contact_details" placeholder="Contact Details" class="w-full p-3 border border-gray-300 rounded" required>
                <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded">Submit</button>
            </form>
        </div>
    </main>



<footer class=" mt-[119px]">
    <x-footer bgimage='images/building/build8.png' />
</footer>

</body>
</html>
