<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>About Us</title>
</head>

<body>
    <x-headerbar />
    <x-title-area title="About Us" subtitle="Home - About Us" image="images/building/build3.jpg" />

    <div class="bg-center" style="background-image: url('images/building/build4.jpg')">
        <div class="h-full w-full bg-[#ffffffa1]  py-16">

            <div class="grid grid-cols-1 md:grid-cols-2 justify-items-center pt-28">

                <div class="relative flex flex-col justify-center max-w-[750px]  px-10">
                    <img src="{{ asset('images/building/build13.png') }}" alt=""
                        class="absolute -top-12 right-10 h-44 w-80 rounded-md">
                    <img src="{{ asset('images/building/build12.png') }}" alt=""
                        class="w-full h-full rounded-md">
                    {{-- <div
                        class="relative -top-24 left-4 w-44 flex flex-col justify-center items-center p-3 rounded-md bg-black bg-opacity-75">
                        <div class="flex">
                            <div class="absolute left-4 rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                            <div class="absolute left-10 rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                            <div class="relative rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                            <div class="absolute right-10 rounded-full h-10 w-10 bg-slate-500 border-2"></div>
                            <div
                                class="absolute right-4 rounded-full h-10 w-10 bg-yellow-500 border-2 flex justify-center items-center">
                                <span class="text-primary">69+</span>
                            </div>
                        </div>
                        <span class="text-primary text-xs">Top Rated around globe</span>
                    </div> --}}
                </div>


                <div class="pe-10">
                    <div class=" font-semibold px-10 p-6 max-w-[750px] bg-[#FFFFFFAA] rounded-lg">
                        <h2 class="text-[50px] text-center ">Investment Lanka</h2>
                            <p class="text-center text-lg">
                                Welcome to Investment Lanka, your premier destination for property
                                investments in Sri Lanka! Whether you're searching for your dream home,
                                an ideal commercial space, or lucrative investment opportunities, we’re
                                here to make your property journey smooth, secure, and successful.

                                <br>

                                At Investment Lanka, we combine local expertise with global standards to
                                deliver a curated selection of properties across Sri Lanka’s most desirable
                                locations. From lush beachfront villas and city apartments to thriving
                                commercial spaces and development-ready land, we cater to a diverse
                                clientele with unique needs and visions.

                                <br>

                                Our team of property experts brings a deep understanding of Sri Lanka’s
                                real estate landscape, helping you make informed decisions backed by
                                industry insights and market trends. With a commitment to integrity,
                                transparency, and personalized service, we go beyond the typical property
                                listings. We strive to provide a seamless experience for buyers, sellers, and
                                investors, offering end-to-end support that takes the stress out of property
                                transactions.

                                <br>

                                Whether you're a first-time homebuyer or a seasoned investor, we are
                                dedicated to helping you make investments that align with your goals.
                                Discover a new standard in property investment with Investment Lanka—
                                where your dreams meet solid opportunities.
                            </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
{{--

    <x-signature-feature />

    <x-overview-label />

    <div class="bg-cover" style="background-image: url('{{ asset('images/building/build4.jpg') }}')">
        <div class="h-full w-full px-2 md:px-20 py-16 bg-[#ffffff7c] flex flex-col items-center justify-center">

            <div class="grid grid-cols-1 lg:grid-cols-2 justify-items-center gap-6 max-w-[1000px]">
                <div class="flex flex-col justify-center p-10 gap-3">
                    <span class="text-base uppercase text-accent">Epic Imagery</span>
                    <span class="text-2xl text-primary font-bold">A Picture is Worth a Thousand Words: Discover the
                        Gallery.</span>
                    <span class="text-base text-primary">Ut felis sem, placerat vel sollicitudin ut, mollis non dui.
                        Donec vehicula scelerisque mauris facilis</span>
                    <button
                        class="bg-accent py-2 px-5 rounded-lg active:translate-y-[1px] active:bg-yellow-200 max-w-40">View
                        all photos</button>
                </div>

                <div class="grid grid-rows-2 grid-cols-3 gap-x-0">

                    <img src="{{ asset('images/property/prop3.png') }}" alt=""
                        class="h-40 w-40 p-1 object-cover">
                    <img src="{{ asset('images/property/prop4.png') }}" alt=""
                        class="h-80 w-40 p-1 object-cover col-span-1 row-span-2">
                    <img src="{{ asset('images/property/prop5.png') }}" alt=""
                        class="h-40 w-40 p-1 object-cover">
                    <img src="{{ asset('images/building/hall1.png') }}" alt=""
                        class="h-40 w-40 p-1 object-cover">
                    <img src="{{ asset('images/property/prop6.png') }}" alt=""
                        class="h-40 w-40 p-1 object-cover">
                </div>

            </div>

            {{-- Feedback Area --}}
            {{-- <div class="relative w-full max-w-4xl py-10">
                <div class="carousel-item p-4 bg-primary shadow-lg flex flex-wrap sm:flex-nowrap items-center justify-center rounded-md">
                    <div class="flex flex-col gap-3 p-4 relative max-w-[1000px]">
                        <span class="capitalize text-sm text-accent">Hear It from</span>
                        <span class="text-4xl font-bold">Mr.pradeep feedback About Platform</span>
                        <div class="flex flex-col pr-4">
                            <span>⭐⭐⭐⭐⭐</span>
                            <span class="text-sm italic mb-10">Cras lacus risus, porta eget nulla quis, efficitur
                                sodales diam. Pellentesque at blandit tortor. Morbi faucibus eu eros at ultrices. Duis
                                vestibulum congue metus, ut commodo felis commodo at. Proin finibus hendrerit sodales.
                                Nunc nec ipsum non metus consectetur pellentesque non eget sapien. Etiam leo ligula,
                                molestie vel turpis id, eleifendt.</span>
                        </div>
                        <div class="flex justify-center items-center gap-2 absolute bottom-4 left-4">
                            <img src="images/building/build1.jpg" alt="" class="h-5 w-5 rounded-full">
                            <div class="flex flex-col">
                                <span class="text-xs font-bold">Hailey Mccray</span>
                                <span class="text-[10px]">Los angles</span>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('images/person/person1.png') }}" alt="" class="h-56 w-48 object-cover">
                </div>
            </div>

            <x-meet-agents  />

        </div>
    </div> --}}

    <x-footer bgimage='images/building/build8.png' />

</body>

</html>
