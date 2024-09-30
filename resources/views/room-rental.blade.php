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
    <title>Room Rental</title>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
<header class="flex-shrink-0 mb-[140px]">
    <x-headerbar />
    <x-title-area
        title="Room Rental Form"
        subtitle="Home - Room Rental"
        image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
    />
</header>
<div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-black mb-4">Room Rental Form</h2>
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
<footer class="mt-8">
    <x-footer bgimage='images/building/build8.png' />
</footer>
</body>
</html>