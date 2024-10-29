<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <img src="{{ asset('storage/' . $ad->image_path) }}" alt="{{ $ad->title }}" class="w-full h-auto object-cover rounded-lg mb-4">
        <h1 class="text-2xl font-bold mb-2">{{ $ad->title }}</h1>
        <p class="text-xl text-green-600 font-semibold mb-2">Price: {{ $ad->price }}</p>
        <p class="text-gray-700 mb-4">Location: {{ $ad->location }}</p>
        <p class="text-gray-700">{{ $ad->description }}</p>
        <!-- Add more fields as needed -->
    </div>
</body>
</html>
