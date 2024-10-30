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
                </div><div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
                    <h2 class="text-white">{{ $ad->location }}</h2>
                </div>
                <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
                    <h2 class="text-white text-center">{{ $ad->contact_details }}</h2>
                </div>
                <div class="flex-1 p-6 rounded-lg bg-gradient-to-r from-yellow-400 to-yellow-700">
                    <h2 class="text-white text-center">{{ number_format($ad->price, 2) }} LKR</h2>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Container for horizontal layout -->
    <div class="bg-transparent py-6 mb-4 rounded-lg  flex flex-col md:flex-row gap-4" style="">

        <!-- Sub-component 1 -->
        <!-- <div class="flex-1 p-6 rounded-lg" style="background: linear-gradient(90deg, #FFD800 0%, #998200 100%);">
            <h2 class="text-white">3911 Firestone Blvd, South Gate, CA 90280, United States</h2> use location there
        </div> -->

        <!-- Sub-component 2 -->
        <!-- <div class="flex-1 p-6 rounded-lg" style="background: linear-gradient(90deg, #FFD800 0%, #998200 100%);">
            <h2 class="text-white text-center">078 3378585</h2> use contact details there
        </div> -->

        <!-- Sub-component 3 -->
        <!-- <div class="flex-1 p-6 rounded-lg" style="background: linear-gradient(90deg, #FFD800 0%, #998200 100%);">
            <h2 class="text-white text-center ">price </h2> use price there -->
        </div>

    </div>


    <!-- Sub-component 4 -->
    <div class="bg-transparent py-6 rounded-lg  w-full" style=""> use title there
        <h1 class="text-5xl font-semibold leading-tight text-left" style="font-family: Jost;">Elysian Palms Retreat</h1>
        use description there
        <p>Duis imperdiet purus eget tortor ornare, quis malesuada dui pharetra. In quis mauris facilisis, pulvinar
            felis ac, molestie ligula. Mauris lacus massa, facilisis ac lacus ac, condimentum vulputate est. Vestibulum
            sit amet felis eu dui accumsan lacinia eget sed orci. Cras et ipsum lorem. Morbi velit magna, malesuada non
            mattis sed, iaculis id urna. Nam mattis, purus ac rutrum rutrum, felis ipsum dictum massa, et pharetra metus
            nibh et arcu. Maecenas quis laoreet sapien. Morbi sit amet accumsan lorem. Sed sed justo eget elit
            scelerisque iaculis ut quis erat. Sed eu laoreet diam, vitae vehicula tellus. Nulla at nibh elit. Ut
            accumsan, diam eget lacinia ultricies, nibh massa condimentum felis, maximus sollicitudin erat est nec
            massa. Aenean sit amet ultricies sem.</p>
    </div>
</div>