<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>FAQ</title>
    <style>
        .accordion-button:after {
            content: "\002B";
            font-size: 24px;
            color: #000;
            background-color: white;
            padding: 0 6px;
            border-radius: 15px;
            float: right;
            margin-left: 5px;
        }

        .accordion-button.collapsed:after {
            content: "\2212";
            background-color: rgba(255, 223, 0, 1);
        }

        .categorybtn.active {
            background-color: rgba(255, 223, 0, 1);
        }
    </style>
</head>

<body>
    <x-headerbar />
    <x-title-area title="FAQ" subtitle="Home - FAQ" image="images/building/build3.jpg" />

    <div class="bg-cover bg-center" style="background-image: url('{{ asset('images/building/build1.jpg') }}')">
        <div class="grid grid-cols-1 md:grid-cols-3 w-full px-2 lg:px-20 py-10 bg-[#ffffff95]">
            <!-- FAQ Section -->
            <div class="md:col-span-2 p-6 rounded-lg shadow-lg">
                <div class="flex flex-col">
                    <span class="text-center text-base text-accent uppercase">Discover More</span>
                    <span class="text-center text-3xl font-bold">All You Need to Know</span>
                </div>
                <div class="flex items-center justify-center gap-2 flex-wrap mt-2">
                    <button
                        class="categorybtn active bg-white focus:outline-accent p-2 rounded text-black flex items-center shadow-md">
                        <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div>Payments
                    </button>
                    <button class="categorybtn bg-white focus:outline-accent p-2 rounded text-black flex items-center shadow-md">
                        <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div>Building
                    </button>
                    <button class="categorybtn bg-white focus:outline-accent p-2 rounded text-black flex items-center shadow-md">
                        <div class="bg-slate-500 h-5 w-5 rounded-md mr-1"></div>Loan Process
                    </button>
                </div>
                <div class="space-y-4 pt-4">
                    <!-- FAQ Item -->
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            What are the key features of the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            How many bedrooms and bathrooms does the property have?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Are there any homeowners association (HOA) fees?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Are there any recent renovations or upgrades to the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Is there parking available on the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Are there any upcoming developments or projects in the area?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            What is the energy efficiency rating of the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Are there any restrictions or covenants associated with the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            What are the nearby schools, amenities, and attractions?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Can I schedule a viewing or tour of the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            What are the terms of the sale, including deposit and closing dates?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Are there any warranties or guarantees on the property?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>
                    <div class="border-b border-lightgray pb-4">
                        <button class="accordion-button text-left w-full py-2 text-lg font-medium focus:outline-none">
                            Is the property part of a larger community or development?</button>
                        <div class="accordion-content hidden mt-2 pl-4 text-gray-600">
                            <p>Aenean tincidunt bibendum magna a varius. Donec tincidunt massa vel laoreet cursus
                                estibulum sodales lacus nec nunc aliquet, quis efficitur est faucibus.</p>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Form Section -->
            <div>
                <div class="flex flex-col bg-white p-6 rounded-lg shadow-lg m-2">
                    <img src="{{ asset('images/person/quesman.png') }}" alt="Question person">
                    <h2 class="text-xl font-semibold my-4">Didn't find an answer?</h2>
                    <form action="#">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full bg-secondary rounded-md shadow-sm p-2 focus:outline-accent"
                                placeholder="Your Name" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full bg-secondary rounded-md shadow-sm p-2 focus:outline-accent"
                                placeholder="Your Email" required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Mobile
                                Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="mt-1 block w-full bg-secondary rounded-md shadow-sm p-2 focus:outline-accent"
                                placeholder="Mobile Number">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Additional
                                Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="mt-1 block w-full bg-secondary rounded-md shadow-sm p-2 focus:outline-accent"
                                placeholder="Please write any note here..." required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-accent text-black p-2 rounded-md hover:bg-yellow-400">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <x-footer bgimage='images/building/build8.png' />

    <script>
        // Accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            const accordions = document.querySelectorAll('.accordion-button');
            accordions.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.toggle('collapsed');
                    const content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            });

            const categorybtn = document.querySelectorAll('.categorybtn');

            categorybtn.forEach(link => {
                link.addEventListener('click', () => {
                    categorybtn.forEach(link => link.classList.remove('active'));
                    link.classList.add('active');
                });
            });

        });
    </script>
</body>

</html>
