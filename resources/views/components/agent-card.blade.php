<div class="bg-white rounded-lg shadow-lg p-6 flex flex-col">
    <img src="{{ asset($image) }}" alt="Agent Photo" class="rounded-full w-[60%] aspect-square object-cover m-auto p-1 border border-lightgray">
    <h3 class="text-center mt-4 text-xl font-bold">{{ $name }}</h3>
    <p class="text-center">{{ $type }}</p>
    <div class="flex justify-center mt-4">
        <div class="border border-lightgray rounded-l-lg p-1">
            <p class="text-center text-base font-bold">192</p>
            <p class="text-center text-xs">For Rent</p>
        </div>
        <div class="border-y border-lightgray p-1">
            <p class="text-center text-base font-bold">78</p>
            <p class="text-center text-xs">For Sale</p>
        </div>
        <div class="border border-lightgray rounded-r-lg p-1">
            <p class="text-center text-base font-bold">08</p>
            <p class="text-center text-xs">For Lease</p>
        </div>
    </div>
    <div class="flex justify-around mt-4 max-w-44 self-center w-full">
        <a href="#" class="px-1 border rounded-md"><i class="fa fa-facebook-official"></i></a>
        <a href="#" class="px-1 border rounded-md"><i class="fa fa-twitter"></i></a>
        <a href="#" class="px-1 border rounded-md"><i class="fa fa-pinterest"></i></a>
        <a href="#" class="px-1 border rounded-md"><i class="fa fa-youtube-play"></i></a>
    </div>
</div>
