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
    <title>Address Verification</title>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 mb-[140px]">
        <x-headerbar />
        <x-title-area
            title="Address Verification"
            subtitle="Home - Address Verification"
            image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}"
        />
    </header>

    <!-- Upload Section -->
    <main class="flex-grow flex flex-col items-center justify-center">
        <div class="bg-white bg-opacity-80 p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-bold text-black mb-4">Upload Address Document</h1>
            <p class="text-gray-600 mb-4">Please upload a PDF or image document for address verification.</p>

            <form  method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Document Upload -->
                <div>
                    <label for="address-document" class="block text-sm font-medium text-black">Upload Document</label>
                    <input type="file" id="address-document" name="address_document" accept=".pdf,image/*" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent" required>
                </div>

                <button type="submit" class="w-full p-3 bg-accent text-white rounded-lg font-semibold hover:bg-secondary transition duration-300">Submit</button>
            </form>
        </div>
    </main>

     <!-- Footer Section -->
     <footer class=" mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>
</body>
</html>
