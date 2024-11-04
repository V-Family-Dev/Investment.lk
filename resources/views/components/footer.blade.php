<footer class="text-white bg-cover bg-center " style="background-image: url({{ asset($bgimage) }})">
    <div class="bg-black bg-opacity-60   pt-12 pb-4 px-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <div class="flex flex-col gap-3">
                {{-- <p class="mb-4">Ut eleifend mattis ligula, porta finibus urna gravida at. Aenean vehiculles arcu non mattis
                    Integer</p> --}}
                <span>Follow Us on social </span>
                <div class="flex space-x-4 mb-4">
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </div>
                <div class="font-medium text-lg">
                    info@investmentlanka.com
                </div>
                {{-- <span>Download our App</span>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="flex gap-2 items-center p-2 rounded-2xl bg-darkblue2">
                        <img src="{{ asset('images/icons/google-play-store-icon.svg') }}" class="h-6 w-6">
                        <div class="flex flex-col">
                            <span>Get it on</span>
                            <span class="font-bold text-[100%]">Google Play</span>
                        </div>
                    </a>
                    <a href="#" class="flex gap-2 items-center p-2 rounded-2xl bg-darkblue2">
                        <img src="{{ asset('images/icons/apple-icon.svg') }}" class="h-6 w-6 invert filter-white">
                        <div class="flex flex-col">
                            <span>Get it on</span>
                            <span class="font-bold text-[100%]">Google Play</span>
                        </div>
                    </a>
                </div> --}}
            </div>

            <div>
                <div class="bg-darkblue2 rounded-2xl flex items-center self-center justify-around p-2">
                    <img src="{{ asset('images/property/picon.png') }}" alt="" class="h-16 w-16 rounded-2xl">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Want to sell your Property?</h3>
                        <a href="#" class="text-accent text-sm font-bold">Contact Us →</a>
                    </div>
                </div>
                <div class="flex  p-2 pt-7">
                    <div>
                        <h3 class="text-lg font-bold mb-4">Quick access</h3>
                        <ul>
                            <li><a href="/home2" class="block mb-2 text-sm hover:text-accent">Home</a></li>
                            <li><a href="{{ route('property.listings') }}" class="block mb-2 text-sm hover:text-accent">Discover</a></li>
                            <li><a href="/AboutUs" class="block mb-2 text-sm hover:text-accent">About us</a></li>
                            <li><a href="/ContactUs" class="block mb-2 text-sm hover:text-accent">Contact Us</a></li>
                        </ul>
                    </div>
                    {{-- <div>
                        <h3 class="text-lg font-bold mb-4">Inner Pages</h3>
                        <ul>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Property Listing</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Property Detail</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Property Plans</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Locate Property</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Agent Profile</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Property Gallery</a></li>
                        </ul>
                    </div> --}}
                </div>

            </div>

            <div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Keep yourself Up to date</h3>
                    <div class="flex mb-4">
                        <input type="email" class="w-full p-2 bg-darkblue2 font-bold focus:outline-accent rounded-tl-lg rounded-bl-lg" placeholder="Enter Your Mail id">
                        <button class="bg-accent px-6 py-2 text-darkblue rounded-tr-lg rounded-br-lg">Send</button>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="terms" class="mr-2">
                        <label for="terms">I agree with the terms & conditions</label>
                    </div>
                </div>
                {{-- <div class="flex justify-around p-2">
                    <div>
                        <h3 class="text-lg font-bold mb-4">Utility Pages</h3>
                        <ul>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Start Here</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Style guide</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Password Page</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">404 Not Found</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Lisences</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick links</h3>
                        <ul>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Terms of use</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Privacy policy</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Pricing Plans</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Our Services</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Contact Support</a></li>
                            <li><a href="#" class="block mb-2 text-sm hover:text-accent">Careers</a></li>
                        </ul>
                    </div>
                </div> --}}

            </div>

        </div>
        {{-- <div class="mt-12 text-center text-sm">
            © Designthemes all rights Reserved
        </div> --}}
    </div>
</footer>
