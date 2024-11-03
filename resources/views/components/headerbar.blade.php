<div class="sticky top-0 z-50">
    <style>
        .nav-link.active {
            color: rgba(255, 223, 0, 1);
        }
    </style>
    <div class="custom-900:overflow-scroll hidden">
        <div class="w-full flex bg-accent px-20 custom-900:px-2 p-2 font-[600] min-w-[900px]">
            <div class="gap-8 flex">
                <span>5630 Stephanie St, Las Vegas</span>
                <span>+17024180420</span>
            </div>
            <div class="ml-auto flex gap-6">
                <span>Mon to Sat 09:00 - 21:00</span>
                <div class="flex gap-2">
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="#" class="border-[1px] rounded-full h-5 w-5 flex items-center justify-center"><i
                            class="fa fa-pinterest" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <nav class="nav bg-black py-6 text-white">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="text-xl font-semibold">Investment Lanka</div>

            <!-- Mobile menu button -->
            <button id="menu-toggle" class="block md:hidden text-accent">
                <i class="fa fa-bars"></i>
            </button>

            <ul class="nav-list hidden md:flex gap-8">
                <li class="nav-item"><a href="/Home2" class="nav-link transition-colors font-bold hover:text-accent">Home</a></li>
                <li class="nav-item"><a href="{{ route('property.listings') }}"  class="nav-link transition-colors font-bold hover:text-accent ">Discover</a></li>
                <li class="nav-item"><a href="/AboutUs" class="nav-link transition-colors font-bold hover:text-accent">About Us</a></li>
                <li class="nav-item"><a href="/ContactUs" class="nav-link transition-colors font-bold hover:text-accent">Contact</a></li>
                <li class="nav-item"><a href="/FAQ" class="nav-link transition-colors font-bold hover:text-accent hidden">F & Q</a></li>
            </ul>

            <div class="login hidden md:flex items-center">
                {{-- <i class="fa fa-sign-in text-accent" aria-hidden="true"></i> --}}
                <img src="{{ asset('images/icons/loginicon.png') }}" alt="" class="h-4 w-4">
                <a href="/login" class="ml-2 login-link">Login/Register</a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-black p-4">
            <ul class="flex flex-col gap-4">
                <li class="nav-item hover:bg-slate-900"><a href="/Home2" class="nav-link transition-colors hover:text-accent">Home</a></li>
                <li class="nav-item hover:bg-slate-900"><a href="/Home3" class="nav-link transition-colors hover:text-accent">Discover</a></li>
                <li class="nav-item hover:bg-slate-900"><a href="/AboutUs" class="nav-link active transition-colors hover:text-accent">About Us</a></li>
                <li class="nav-item hover:bg-slate-900"><a href="/ContactUs" class="nav-link transition-colors hover:text-accent">Contact</a></li>
                <li class="nav-item hover:bg-slate-900"><a href="/FAQ" class="nav-link transition-colors hover:text-accent">F & Q</a></li>
                <li class="login flex items-center hover:bg-slate-900">
                    <i class="fa fa-sign-in text-accent" aria-hidden="true"></i>
                    <a href="/login" class="ml-2 login-link">Login/Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.forEach(link => link.classList.remove('active'));
                    link.classList.add('active');
                });
            });

            document.getElementById('menu-toggle').addEventListener('click', () => {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            });
        });
    </script>

</div>
