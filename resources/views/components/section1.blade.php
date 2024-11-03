@props(['ad', 'adDetails'])

<!-- Sub-component 1 -->
<div style="">
    <div class="relative bg-transparent shadow-md">
        <!-- Full-size photo -->
        <img src="{{ asset('storage/' . explode(',', $ad->image_path)[0]) }}" alt="Full-size photo" class="w-full aspect-video object-cover">

        <!-- Play button image centered over the photo -->
        <a href="URL_TO_LINK" class=" inset-0 flex items-center justify-center absolute top-0 left-0">
            <img src="{{ asset('images/property/anju/playbuttone.png') }}" alt="Play Button">
        </a>
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
            <h2 class="text-black font-bold text-lg">{{ $ad->location }}</h2>
        </div>

        <!-- Sub-component 2 -->
        <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
            <h2 class="text-black font-bold text-lg">{{ $ad->contact_details }}</h2>
        </div>

        <!-- Sub-component 3 -->
        <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
            <h2 class="text-black font-bold text-lg text-center">{{ number_format($ad->price, 2) }} LKR</h2>
        </div>

    </div>
    <!-- Display additional fields -->

    <!-- Sub-component 4 -->
    <div class="bg-transparent py-6 rounded-lg  w-full" style="">
        <h1 class="text-5xl font-semibold leading-tight text-left" style="font-family: Jost;">{{ $ad->title }}</h1>
        <p class="mt-4 text-gray-700">{{ $ad->description }}</p>
    </div>
    <div>
                <p class=" text-[20px] font-bold ml-1">Other details</p>
            </div>
    <div class="extra-details">
    @foreach($adDetails as $key => $value)
        @if($value) <!-- Check if value exists -->
            <div class="flex justify-between py-2 border-b border-gray-200">
                <span class="font-semibold text-gray-800">{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                <span class="text-gray-600">{{ $value }}</span>
            </div>
        @endif
    @endforeach
</div>

</div>
