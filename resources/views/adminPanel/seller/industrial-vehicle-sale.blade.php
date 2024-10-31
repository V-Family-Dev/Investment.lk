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
    <title>Industrial</title>
</head>

<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 ">
        <x-headerbar />
        <x-title-area title="Industrial Vehicle / Machine Sale Form" subtitle="Home - Industrial Vehicle Sale"
            image="{{ asset('images/property/anju/industrial.png') }}" />
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-[105px]">
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
        <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-black mb-4">Industrial Vehicle / Machine Sale Form</h2>
            <form class="space-y-4" action="{{ route('vehical.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="vehical_name" placeholder="Vehicle Name"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="brand" placeholder="Brand" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="location" placeholder="Location"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="condtion" placeholder="Condition"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="number" name="price" placeholder="Price" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="contact_details" placeholder="Contact Details" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="model" placeholder="Model" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" name="year" placeholder="Year of Manufacture"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="fual_type" placeholder="Fuel Type"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="mileage" placeholder="Mileage"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <textarea name="description" placeholder="Description" class="w-full p-3 border border-gray-300 rounded"
                    required></textarea>
                <input type="text" name="color" placeholder="Color" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="file" name="image[]" class="w-full border border-gray-300 rounded" multiple>
                <input type="text" name="engine_capacity" placeholder="Engine Capacity"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="bodytype" placeholder="Body Type"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="edition" placeholder="Trim / Edition"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" name="transmisson" placeholder="Transmission"
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