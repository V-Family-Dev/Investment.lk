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
            <x-title-area title="Apartment Rental Form" subtitle="Home - Apartment Rental"
                image="{{ asset('images/property/anju/propertyHeader.png') }}" />
        </header>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <!-- Details Section -->
        <main class="flex flex-1 items-center justify-center p-4">
            <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-black mb-4">update Apartment Rental Form</h2>
                <form class="space-y-4" action="{{ route('apartment-rentals.update',$apartmentRental->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" placeholder="Title" value="{{ old('title', $apartmentRental->title) }}"
                        class="w-full p-3 border border-gray-300 rounded" required>
                    <input type="text" name="location" placeholder="Location" value="{{ old('location', $apartmentRental->location) }}"
                        class="w-full p-3 border border-gray-300 rounded" required>
                    <input type="number" name="rent_price" placeholder="Rent Price"value="{{ old('rent_price', $apartmentRental->rent_price) }}"
                        class="w-full p-3 border border-gray-300 rounded" required>
                    <input type="text" name="size" placeholder="Size" value="{{ old('size', $apartmentRental->size) }}" class="w-full p-3 border border-gray-300 rounded"
                        required>
                    <textarea name="features" placeholder="Features"
                        class="w-full p-3 border border-gray-300 rounded">{{ old('features', $apartmentRental->features) }}</textarea>
                    <textarea name="description" placeholder="Description"
                        class="w-full p-3 border border-gray-300 rounded" required>{{ old('description', $apartmentRental->description) }}</textarea>
                    <input name="image[]" type="file" class="w-full border border-gray-300 rounded" multiple>
                    <input name="contact_details" type="text" placeholder="Contact Details" value="{{ old('contact_details', $apartmentRental->contact_details) }}"
                        class="w-full p-3 border border-gray-300 rounded" required>
                    <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded">Submit</button>
                </form>
            </div>
        </main>

        <!-- Footer Section -->
        <footer>
            <x-footer bgimage='images/building/build8.png' />
        </footer>
    </div>
</body>

</html>