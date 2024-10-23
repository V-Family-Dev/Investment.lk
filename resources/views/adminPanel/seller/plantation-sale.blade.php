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
    <title>Plantation Sale</title>
</head>

<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 mb-[140px]">
        <x-headerbar />
        <x-title-area title="Plantation Sale Form" subtitle="Home - Plantation Sale"
            image="{{ asset('images/property/anju/plantation.png') }}" />
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
    <main class="flex-grow flex flex-col items-center justify-center">
        <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-black mb-4">Plantation Sale Form</h2>
            <form class="space-y-4" action="{{ route('plantation_sales.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Title" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="plantation_type" placeholder="Plantation Type"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="size" placeholder="Size" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="location" placeholder="Location"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="number" name="price" placeholder="Price" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <textarea name="description" placeholder="Description" class="w-full p-3 border border-gray-300 rounded"
                    required></textarea>
                <input type="file" name="image[]" class="w-full border border-gray-300 rounded" multiple>
                <input type="text" name="contact_details" placeholder="Contact Details"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded">Submit</button>
            </form>
        </div>
    </main>


    <footer class=" mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>



</body>

</html>