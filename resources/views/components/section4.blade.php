<div class="flex flex-col w-screen">
    <div class=" flex relative w-full ">
        <video autoplay muted loop id="myVideo" class="w-full h-auto object-cover">
            <source src="/images/property/anju/Architecture Buildings Royalty Free Stock Footage No Copyright Video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>

    <div class="overflow-hidden">
        <div class="flex animate-marquee space-x-4">
            <img class=" w-[1510px]" src="{{ asset('images/property/anju/Marqueesection3.png') }}" alt="Section 3 Photo">
            <img class=" w-[1510px]" src="{{ asset('images/property/anju/Marqueesection3.png') }}" alt="Section 3 Photo">
            <img class=" w-[1510px]" src="{{ asset('images/property/anju/Marqueesection3.png') }}" alt="Section 3 Photo">
            <img class=" w-[1510px]" src="{{ asset('images/property/anju/Marqueesection3.png') }}" alt="Section 3 Photo">
            <img class=" w-[1510px]" src="{{ asset('images/property/anju/Marqueesection3.png') }}" alt="Section 3 Photo">
        </div>
    </div>

    <style>
    @keyframes marquee {
      0% {
        transform: translateX(100%);
      }
      100% {
        transform: translateX(-100%);
      }
    }

    .animate-marquee {
      animation: marquee 10s linear infinite;
    }
    </style>

</div>
