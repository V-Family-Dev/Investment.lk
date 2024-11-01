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
    <title>Land Sale</title>
</head>

<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->
    <header class="flex-shrink-0 ">
        <x-headerbar />
        <x-title-area title="Land Sale Form" subtitle="Home - Land Sale"
            image="{{ asset('images/property/anju/newsblogheader.png') }}" />
    </header>

    <main class="flex-grow flex flex-col items-center justify-center p-[105px]">
        <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-black mb-4">update Land Sale Form</h2>
            <form class="space-y-4" action="{{ route('land_sales.update',$land_sale->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" value="{{old('title',$land_sale->title)}}" name="title" placeholder="Title" class="w-full p-3 border border-gray-300 rounded"
                    required>
                <input type="text" value="{{old('land_type',$land_sale->land_type)}}" name="land_type" placeholder="Land Type"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" value="{{old('land_size',$land_sale->land_size)}}" name="land_size" placeholder="Land Size"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="text" value="{{old('location',$land_sale->location)}}" name="location" placeholder="Location"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <input type="number" value="{{old('price',$land_sale->price)}}" name="price" placeholder="price"
                    class="w-full p-3 border border-gray-300 rounded" required>
                <textarea name="description" placeholder="Description" class="w-full p-3 border border-gray-300 rounded"
                    required>{{old('description',$land_sale->description)}}"</textarea>
                <input type="file"  name="image[]" class="w-full border border-gray-300 rounded" multiple>
                <input type="text" value="{{old('contact_details',$land_sale->title)}}" name="contact_details" placeholder="Contact Details"
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