<style>
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        /* Ensure no margin */
        padding: 0;
    }

    .card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 15rem;
        height: 12rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card img {
    }
</style>
<div class="flex items-center justify-center overflow-x-hidden">
    <div class="max-w-4xl w-full px-4">
        <h1 class="text-center text-accent mb-2 text-sm">Curated Collection</h1>
        <h2 class="text-center mb-6 text-4xl font-bold">Spaces to Grow and Thrive.</h2>
        <div class="swiper-container mySwiperCard">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card">
                        <div class="bg-zinc-100 rounded-lg m-2 w-14 h-14 flex items-center justify-center">
                            <img src="images/icons/building.png" alt="Building" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm sm:text-lg font-semibold">Building</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">48 Properties</p>
                        <a href="#" class="text-yellow-500 font-semibold">View All →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="bg-zinc-100 rounded-lg m-2 w-14 h-14 flex items-center justify-center">
                            <img src="images/icons/appartment.png" alt="Appartment" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm sm:text-lg font-semibold">Appartment</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">48 Properties</p>
                        <a href="#" class="text-yellow-500 font-semibold">View All →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="bg-zinc-100 rounded-lg m-2 w-14 h-14 flex items-center justify-center">
                            <img src="images/icons/soloshop.png" alt="Solo Shop" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm sm:text-lg font-semibold">Solo Shop</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">48 Properties</p>
                        <a href="#" class="text-yellow-500 font-semibold">View All →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="bg-zinc-100 rounded-lg m-2 w-14 h-14 flex items-center justify-center">
                            <img src="images/icons/township.png" alt="Town Ship" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm sm:text-lg font-semibold">Town Ship</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">48 Properties</p>
                        <a href="#" class="text-yellow-500 font-semibold">View All →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="bg-zinc-100 rounded-lg m-2 w-14 h-14 flex items-center justify-center">
                            <img src="images/icons/warehouse.png" alt="Warehouse" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm sm:text-lg font-semibold">Warehouse</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">48 Properties</p>
                        <a href="#" class="text-yellow-500 font-semibold">View All →</a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="bg-zinc-100 rounded-lg m-2 w-14 h-14 flex items-center justify-center">
                            <img src="images/icons/commercial.png" alt="Commercial" class="w-10 h-10">
                        </div>
                        <h3 class="text-sm sm:text-lg font-semibold">Commercial</h3>
                        <p class="text-gray-500 text-xs sm:text-sm">48 Properties</p>
                        <a href="#" class="text-yellow-500 font-semibold">View All →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination relative mt-6"></div>
    </div>
</div>
