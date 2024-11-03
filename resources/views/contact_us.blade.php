<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>Contact Us</title>
</head>

<body>
    <x-headerbar />
    <x-title-area title="Contact Us" subtitle="Home - Contact Us" image="images/building/build14.png" />

    <div class="bg-center" style="background-image: url('images/building/build4.jpg')">
        <div class="h-full w-full bg-[#ffffffa1] px-2 md:px-20 py-16 flex flex-col items-center gap-10">

            <div class="bg-primary p-6 h-64 w-full max-w-[1000px] hidden">
                {{-- map include here --}}
            </div>

            <div class="flex justify-center gap-10 w-full max-w-[1000px]">
                {{-- <div class="flex flex-col gap-2">
                    <span class="uppercase text-sm text-accent">Contact Us</span>
                    <span class="text-2xl font-bold">Get in Touch and Explore.</span>
                    <div class="flex flex-col pt-2 gap-2">
                        <div class="flex flex-wrap gap-2">
                            <div class="flex gap-2">
                                <div class="bg-primary rounded-full p-3">
                                    <img src="{{ asset('images/icons/world.png') }}" alt="" class="h-6 w-6">
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">Have Quires ?</span>
                                    <span class="text-sm">Seestrasse St, Zurich, CH</span>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="bg-primary rounded-full p-3">
                                    <img src="{{ asset('images/icons/world.png') }}" alt="" class="h-6 w-6">
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">Have Quires ?</span>
                                    <span class="text-sm">Seestrasse St, Zurich, CH</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <div class="flex gap-2">
                                <div class="bg-primary rounded-full p-3">
                                    <img src="{{ asset('images/icons/world.png') }}" alt="" class="h-6 w-6">
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">Have Quires ?</span>
                                    <span class="text-sm">Seestrasse St, Zurich, CH</span>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="bg-primary rounded-full p-3">
                                    <img src="{{ asset('images/icons/world.png') }}" alt="" class="h-6 w-6">
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold">Have Quires ?</span>
                                    <span class="text-sm">Seestrasse St, Zurich, CH</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="max-w-3xl w-full bg-white p-6 rounded-lg shadow-lg">
                    <form action="#" method="">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium">Name</label>
                                <input type="text" id="name" name="name"
                                    class="mt-1 block w-full rounded-md shadow-sm p-2 focus:outline-accent bg-secondary"
                                    placeholder="Mimosic john" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium">Email</label>
                                <input type="email" id="email" name="email"
                                    class="mt-1 block w-full rounded-md shadow-sm p-2 focus:outline-accent bg-secondary"
                                    placeholder="your@email.com" required>
                            </div>

                            <div>
                                <label for="date" class="block text-sm font-medium">Desired
                                    date</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input type="date" id="date" name="date"
                                        class="block w-full rounded-md p-2 focus:outline-accent bg-secondary" required>
                                </div>
                            </div>

                            <div>
                                <label for="time" class="block text-sm font-medium">Desired
                                    time</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input type="time" id="time" name="time"
                                        class="block w-full rounded-md p-2 focus:outline-accent bg-secondary" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="message" class="block text-sm font-medium">Additional
                                Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="mt-1 block w-full rounded-md shadow-sm p-2 focus:outline-accent bg-secondary"
                                placeholder="Please write any note here..." required></textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit"
                                class="w-full bg-accent text-black p-2 rounded-md active:bg-yellow-200">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <x-footer bgimage='images/building/build8.png' />

</body>

</html>
