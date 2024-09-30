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
    <div class="flex flex-col min-h-screen">
        <!-- Header Section -->
        <header>
            <x-headerbar />
            <x-title-area
                title="Apartment Rental Form"
                subtitle="Home - Apartment Rental"
                image="{{ asset('images/property/anju/propertyHeader.png') }}"
            />
        </header>

        <!-- Details Section -->
        <main class="flex flex-1 items-center justify-center p-4">
            <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-black mb-4">Apartment Rental Form</h2>
                <form class="space-y-4">
                    <input type="text" placeholder="Title" class="w-full p-3 border border-gray-300 rounded" required>
                    <input type="text" placeholder="Location" class="w-full p-3 border border-gray-300 rounded" required>
                    <input type="number" placeholder="Rent Price" class="w-full p-3 border border-gray-300 rounded" required>
                    <input type="text" placeholder="Size" class="w-full p-3 border border-gray-300 rounded" required>
                    <textarea placeholder="Features" class="w-full p-3 border border-gray-300 rounded"></textarea>
                    <textarea placeholder="Description" class="w-full p-3 border border-gray-300 rounded" required></textarea>
                    <input type="file" class="w-full border border-gray-300 rounded" multiple>
                    <input type="text" placeholder="Contact Details" class="w-full p-3 border border-gray-300 rounded" required>
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
