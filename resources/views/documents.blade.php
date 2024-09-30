<!DOCTYPE html>
<html lang="en">
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
    <title>Upload ID Card</title>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 mb-[140px]">
        <x-headerbar />
        <x-title-area
            title="Upload ID Card"
            subtitle="Home - Upload ID Card"
            image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
        />
    </header>

    <!-- Upload Section -->
    <main class="flex-grow flex flex-col items-center justify-center">
        <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-bold text-black mb-4">Upload Your ID Card</h1>
            <p class="text-gray-600 mb-4">Please upload the front and back sides of your ID card below.</p>

            <form class="space-y-6">
                <!-- Front Side Upload -->
                <div>
                    <label for="id-front" class="block text-sm font-medium text-black">Front Side of ID Card</label>
                    <input type="file" id="id-front" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent" required>
                </div>

                <!-- Back Side Upload -->
                <div>
                    <label for="id-back" class="block text-sm font-medium text-black">Back Side of ID Card</label>
                    <input type="file" id="id-back" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent" required>
                </div>

                <button type="submit" class="w-full p-3 bg-accent text-white rounded-lg font-semibold hover:bg-secondary transition duration-300">Submit</button>
            </form>
        </div>
    </main>

    <footer class=" mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>
</body>
</html>
