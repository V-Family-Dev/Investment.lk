<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-[387.5px] h-auto bg-[#F9FCFF] p-4 rounded-lg shadow-md">
        <div class="relative w-full h-auto bg-[#F9FCFF] p-4 rounded-lg shadow-md flex items-center justify-center overflow-hidden">
            <img id="crud-photo"
                src="{{ asset('images/property/anju/Imageproperty001.png') }}"
                alt="Uploaded Photo"
                class="w-full h-auto object-contain">

            <div class="absolute bottom-0 left-0 p-2 bg-[#ECBD00] bg-opacity-75 rounded-tr-lg hover:bg-opacity-90 transition duration-200">
                <p class="text-white font-bold">$17,000</p>
            </div>
        </div>
        <div class="space-y-4 mt-4">
            <div>
                <p class="text-[#000000] font-bold text-lg sm:text-xl">Regal Ridge Estates</p>
            </div>
            <div class="flex items-center space-x-2">
                <img id="location" src="{{ asset('images/icons/location.png') }}" class="w-[14.4px] h-[18px]">
                <p class="text-black text-sm sm:text-base">1000 W Redondo Beach Blvd, Gardena, CA</p>
            </div>
            <div class="flex flex-wrap justify-between w-full mt-2">
                <div class="flex items-center space-x-2">
                    <img id="Beds" src="{{ asset('images/icons/bed.png') }}" class="w-[14.4px] h-[18px]">
                    <p class="text-black text-sm sm:text-base">Beds</p>
                </div>
                <div class="flex items-center space-x-2">
                    <img id="baths" src="{{ asset('images/icons/bathtub.png') }}" class="w-[14.4px] h-[18px]">
                    <p class="text-black text-sm sm:text-base">Baths</p>
                </div>
                <div class="flex items-center space-x-2">
                    <img id="area" src="{{ asset('images/icons/fullscreen.png') }}" class="w-[14.4px] h-[18px]">
                    <p class="text-black text-sm sm:text-base">1642sq</p>
                </div>
            </div>
        </div>
    </div>
</div>
