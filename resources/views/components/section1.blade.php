@props(['ad', 'adDetails'])

<!-- Sub-component 1 -->
<div style="">
    <div class="relative bg-transparent shadow-md">
        <!-- Full-size photo -->
        <img src="{{ asset('storage/' . explode(',', $ad->image_path)[0]) }}" alt="{{ $ad->title }}"
            class="w-full h-auto rounded-lg mb-4">

        <!-- Play button image centered over the photo -->
    </div>

    <!-- Sub-component 2 with Horizontal Photos -->
    <div class="bg-transparent py-6 " style="">
        <!-- Horizontal Photos -->
        <div class="flex gap-4 mt-5">
            @foreach(explode(',', $ad->image_path) as $image)
                <div class="w-1/4">
                    <img src="{{ asset('storage/' . $image) }}" alt="Additional Photo"
                        class="w-full h-auto rounded-lg shadow-md">
                </div>

            @endforeach



        </div>
    </div>

    <!-- Container for horizontal layout -->
    <div class="bg-transparent py-6 mb-4 rounded-lg  flex flex-col md:flex-row gap-4" style="">

        <!-- Sub-component 1 -->
        <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
            <h2 class="text-white">{{ $ad->location }}</h2>
        </div>

        <!-- Sub-component 2 -->
        <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
            <h2 class="text-white">{{ $ad->contact_details }}</h2>
        </div>

        <!-- Sub-component 3 -->
        <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
            <h2 class="text-white text-center">{{ number_format($ad->price, 2) }} LKR</h2>
        </div>

    </div>
 <!-- Display additional fields -->
 <div class="extra-details">
        @foreach($adDetails as $key => $value)
            @if($value) <!-- Check if value exists -->
                <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
            @endif
        @endforeach
    </div>

    <!-- Sub-component 4 -->
    <div class="bg-transparent py-6 rounded-lg  w-full" style="">
        <h1 class="text-5xl font-semibold leading-tight text-left" style="font-family: Jost;">{{ $ad->title }}</h1>
        <p class="mt-4 text-gray-700">{{ $ad->description }}</p>
    </div>
</div>