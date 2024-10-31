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
    <title>Property Detail</title>
</head>

<body class="flex flex-col w-full min-h-screen">
    <!-- Header Section -->

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
    <header class="flex-shrink-0 mb-[140px]">
        <x-headerbar />
        <x-title-area title="Equipment Sale Form" subtitle="Home - Equipment Sale"
            image="{{ asset('images/property/anju/equipment.png') }}" />
    </header>

    <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-black mb-4">update Equipment Sale Form</h2>
        <form class="space-y-4" action="{{ route('equipment_sales.update',$equipment_sale->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <input type="text" name="equipment_name" value="{{old('equipment_name',$equipment_sale->equipment_name)}}" placeholder="Equipment Name"
                class="w-full p-3 border border-gray-300 rounded" required>
            <input type="text" name="brand" value="{{old('brand',$equipment_sale->brand)}}" placeholder="Brand" class="w-full p-3 border border-gray-300 rounded"
                required>
            <input type="text" name="location" value="{{old('location',$equipment_sale->location)}}" placeholder="Location" class="w-full p-3 border border-gray-300 rounded"
                required>
            <input type="number" name="price" value="{{old('price',$equipment_sale->price)}}" placeholder="Price" class="w-full p-3 border border-gray-300 rounded"
                required>
            <textarea name="description" placeholder="Description" class="w-full p-3 border border-gray-300 rounded"
                required>{{old('description',$equipment_sale->description)}}</textarea>
            <input type="file" name="image[]"  placeholder="Image" class="w-full border border-gray-300 rounded"
                multiple>
            <input type="text" name="contact_details" value="{{old('contact_details',$equipment_sale->contact_details)}}" placeholder="Contact Details"
                class="w-full p-3 border border-gray-300 rounded" required>
            <button type="submit" class="w-full p-3 bg-yellow-500 text-white rounded">Submit</button>
        </form>
    </div>

    <footer class="mt-8">
        <x-footer bgimage='images/building/build8.png' />
    </footer>
</body>

</html>