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
    <title>Factory Sale Form</title>
</head>

<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 ">
        <x-headerbar />
        <x-title-area title="Factory Sale Form" subtitle="Home - Factory Sale"
            image="{{ asset('images/property/anju/cars09.png') }}" />
    </header>
    <main class=" flex flex-col mt-9">
        <div class="container mx-auto  my-8 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-black mb-4">Upate the Factory Sale Details</h2>
            <form class="space-y-4" action="{{ route('factory-sales.update', $factorySale->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ old('title', $factorySale->title) }}" placeholder="Title" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="property_type" value="{{ old('property_type', $factorySale->property_type) }}" placeholder="Property Type"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="location" value="{{ old('location', $factorySale->location) }}"  placeholder="Location"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="size" value="{{ old('size', $factorySale->size) }}"  placeholder="Size" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="number" name="price" value="{{ old('price', $factorySale->price) }}"  placeholder="Price" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <textarea name="description" placeholder="Description" class="w-full p-3 border border-gray-300 rounded"
                    required>{{ old('description', $factorySale->description) }}</textarea>
                <input type="file" name="image[]" class="w-full border border-gray-300 rounded" multiple>
                <input type="text" name="contact_details" value="{{ old('contact_details', $factorySale->contact_details) }}"  placeholder="Contact Details"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded">Submit</button>
            </form>

        </div>
    </main>

    <footer class="mt-8">
        <x-footer bgimage='images/building/build8.png' />
    </footer>
</body>

</html>