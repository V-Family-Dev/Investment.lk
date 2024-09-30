<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <style>
        /* Custom styles for the circular images */
        .circular-image {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: auto;
        }
    </style>
    <title>Our Agents</title>
</head>

<body>
    <x-headerbar />
    <x-title-area title="Our Agents" subtitle="Home - Our Agents" image="images/building/build7.jpg" />

    <div class="bg-cover" style="background-image: url({{ asset('images/building/build4.jpg') }})">
        <div class="px-2 md:px-10 py-10 flex flex-col items-center w-full bg-[#ffffff6a]">
            <span class="text-center text-accent uppercase text-sm">Agent Spotlight</span>
            <h2 class="text-center text-3xl font-bold mb-8">Meet Our Dedicated Agents</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Card Start -->
                <x-agent-card image="images/person/javion.png" name="Gail Williams" type="ProprHome Agent" />
                <x-agent-card image="images/person/zak.png" name="Brian Holloway" type="ProprHome Agent" />
                <x-agent-card image="images/person/russell.png" name="Russell Conner" type="ProprHome Agent" />
                <x-agent-card image="images/person/edward.png" name="Archie Barrett" type="ProprHome Agent" />
                <x-agent-card image="images/person/leslie.png" name="Lesley Strickland" type="ProprHome Agent" />
                <x-agent-card image="images/person/leon.png" name="Leon Richards" type="ProprHome Agent" />
                <x-agent-card image="images/person/jesse.png" name="Jesse Rivera" type="ProprHome Agent" />
                <x-agent-card image="images/person/arnav.png" name="Arnav Richards" type="ProprHome Agent" />

                <!-- Card End -->
            </div>

            <div class="flex justify-center gap-2 mt-8">
                <button class="bg-primary hover:bg-accent rounded-full text-gray-800 font-bold py-2 px-4">
                    &laquo;
                </button>
                <button class="bg-primary hover:bg-accent rounded-full text-gray-800 font-bold py-2 px-4">1</button>
                <button class="bg-primary hover:bg-accent rounded-full text-gray-800 font-bold py-2 px-4">2</button>
                <button class="bg-primary hover:bg-accent rounded-full text-gray-800 font-bold py-2 px-4">3</button>
                <button class="bg-primary hover:bg-accent rounded-full text-gray-800 font-bold py-2 px-4">
                    &raquo;
                </button>
            </div>

        </div>
    </div>

    <x-footer bgimage='images/building/build8.png' />

</body>

</html>
