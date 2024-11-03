<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Property Listing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/property/anju/propertyDetailBackgroundphoto.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0">
        <x-headerbar />
        <x-title-area
            title="Create Property Listing"
            subtitle="Home - Create Property Listing"
            image="{{ asset('images/property/anju/cars09.png') }}"
        />
    </header>

    <!-- Create Form Section -->
    <main class="flex-grow flex flex-col items-center justify-center m-9">
        <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-bold text-black mb-4">Select Property Category</h1>
            <form>
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-black">Categories</label>
                    <select id="category" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent" required>
                        <option value="">--Select Category--</option>
                        <option value="factories">Factories</option>
                        <option value="high-end-properties">High End Properties</option>
                        <option value="luxury-house">Luxury House</option>
                        <option value="apartment">Apartment</option>
                        <option value="land">Land</option>
                        <option value="hotels">Hotels</option>
                        <option value="bungalow">Bungalow</option>
                        <option value="industrial-vehicle">Industrial Vehicle / Machine</option>
                        <option value="plantation">Plantation</option>
                        <option value="tea">Tea</option>
                        <option value="rubber">Rubber</option>
                        <option value="mango">Mango</option>
                        <option value="coconut">Coconut</option>
                        <option value="other">Other</option>
                        <option value="master-pieces">Master Pieces</option>
                        <option value="antic-values">Antic Values Things</option>
                        <option value="warehouse">Warehouse</option>
                        <option value="tourism-land">Tourism Land / Properties</option>
                        <option value="beach-side">Beach Side Land / Properties</option>
                    </select>
                </div>

                <div>
                    <label for="property-name" class="block text-sm font-medium text-black">Property Name</label>
                    <input type="text" id="property-name" placeholder="Enter property name" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-black">Property Description</label>
                    <textarea id="description" rows="4" placeholder="Enter property description" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent" required></textarea>
                </div>

                <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded-lg font-semibold hover:bg-yellow-200 transition duration-300">Create Listing</button>
            </form>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>
</body>
</html>
