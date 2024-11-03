<div>
    <style>
        input[type="radio"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            border: 2px solid #d1d5db;
            background-color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        input[type="radio"]:checked {
            background-color: rgba(255, 223, 0, 1);
        }
    </style>

    <div class="px-20 custom-470:px-2 py-10 flex flex-col w-full bg-center bg-cover"
        style="background-image: url('{{ asset($bgimage) }}')">
        {{-- <span class="text-accent text-sm custom-470:ml-4">Seamless Living</span>
        <span class="text-primary text-4xl md:text-6xl font-bold custom-470:ml-4">Make Future With Investment </span>
        <span class="text-primary text-4xl md:text-6xl font-bold custom-470:ml-4"> Be a Top Grade Investor </span> --}}
        <form action="#" class="w-full mt-4">
            <div class="flex justify-center gap-4 bg-primary max-w-80 p-2 rounded-tl-3xl rounded-tr-3xl relative pb-4">
                <div>
                    <input type="radio" name="saletype" id="for_rent">
                    <label for="for_rent" class="ml-1">For Rent</label>
                </div>
                <div>
                    <input type="radio" name="saletype" id="for_sale">
                    <label for="for_sale" class="ml-1">For Sale</label>
                </div>
                <div>
                    <input type="radio" name="saletype" id="for_lease">
                    <label for="for_lease" class="ml-1">For Lease</label>
                </div>
            </div>
            <div
                class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 bg-primary px-6 py-5 gap-4 rounded-2xl relative -top-4 custom-470:w-full">
                <select type="text" class="p-2 focus:outline-accent w-full bg-secondary rounded-lg shadow-sm"
                    placeholder="Enter Keyword">
                    <option selected disabled>Select type</option>
                    <option value="1">Factory sale</option>
                    <option value="2">Apartment sale</option>
                    <option value="3">Luxury house sale</option>
                    <option value="4">Colonial style bungalow sale</option>
                    <option value="5">Hotel sale</option>
                    <option value="6">Land sale</option>
                    <option value="7">Industrial vehicles/ Machine sale</option>
                    <option value="8">Plantation sales</option>
                    <option value="9">Equipment sales</option>
                    <option value="10">Apartment rental</option>
                    <option value="11">House rentals</option>
                    <option value="12">Room rental</option>
                </select>


                <div class="relative inline-block text-left">
                    <select type="text" class="p-2 focus:outline-accent w-full bg-secondary rounded-lg shadow-sm"
                    placeholder="Enter Keyword">
                    <option selected disabled>City</option>

                </select>
                </div>

                <div class="relative inline-block text-left">
                    <select type="text" class="p-2 focus:outline-accent w-full bg-secondary rounded-lg shadow-sm"
                    placeholder="Enter Keyword">
                    <option selected disabled>District</option>
                    <option value="1">Colombo</option>
                    <option value="2">Gampaha</option>
                    <option value="3">Kalutara</option>
                    <option value="4">Kandy</option>
                    <option value="5">Matale</option>
                    <option value="6">Nuwara Eliya</option>
                    <option value="7">Galle</option>
                    <option value="8">Matara</option>
                    <option value="9">Hambantota</option>
                    <option value="10">Jaffna</option>
                    <option value="11">Kilinochchi</option>
                    <option value="12">Mannar</option>
                    <option value="13">Mullaitivu</option>
                    <option value="14">Vavuniya</option>
                    <option value="15">Batticaloa</option>
                    <option value="16">Ampara</option>
                    <option value="17">Trincomalee</option>
                    <option value="18">Kurunegala</option>
                    <option value="19">Puttalam</option>
                    <option value="20">Anuradhapura</option>
                    <option value="21">Polonnaruwa</option>
                    <option value="22">Badulla</option>
                    <option value="23">Monaragala</option>
                    <option value="24">Ratnapura</option>
                </select>
                </div>


                <button type="submit" class="bg-accent hover:bg-yellow-200 p-2 text-darkblue w-full rounded-lg">Search
                    property</button>
            </div>
        </form>
        {{-- <div class="grid grid-cols-1 md:grid-cols-3 max-w-[700px] gap-2 text-white text-xs">
            <div class="flex items-center gap-1 py-1 px-2 bg-[#0000008a] rounded-2xl"><i class="fa fa-home text-accent"
                    aria-hidden="true"></i><span>Over 2M properties.</span></div>
            <div class="flex items-center gap-1 py-1 px-2 bg-[#0000008a] rounded-2xl">😃<span>46,789 peoples
                    happy</span></div>
            <div class="flex items-center gap-1 py-1 px-2 bg-[#0000008a] rounded-2xl">⭐⭐⭐⭐⭐<span>4.8 Top rated by
                    People</span></div>
        </div> --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const itemList1 = document.querySelectorAll('.item1');
            const itemList2 = document.querySelectorAll('.item2');
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownButton2 = document.getElementById('dropdown-button2');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const dropdownMenu2 = document.getElementById('dropdown-menu2');
            let isDropdownOpen = true;
            let isDropdownOpen2 = true;

            // toggle dropdown
            function toggleDropdown() {
                isDropdownOpen = !isDropdownOpen;
                if (isDropdownOpen) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            }

            function toggleDropdown2() {
                isDropdownOpen2 = !isDropdownOpen2;
                if (isDropdownOpen2) {
                    dropdownMenu2.classList.remove('hidden');
                } else {
                    dropdownMenu2.classList.add('hidden');
                }
            }

            toggleDropdown();
            toggleDropdown2();

            itemList1.forEach(item => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    toggleDropdown();
                });
            });
            itemList2.forEach(item => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    toggleDropdown2();
                });
            });

            dropdownButton.addEventListener('click', (event) => {
                event.preventDefault();
                toggleDropdown();
            });
            dropdownButton2.addEventListener('click', (event) => {
                event.preventDefault();
                toggleDropdown2();
            });

            // Close the dropdown when clicking outside of it
            window.addEventListener('click', (event) => {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                    isDropdownOpen = false;
                }
                if (!dropdownButton2.contains(event.target) && !dropdownMenu2.contains(event.target)) {
                    dropdownMenu2.classList.add('hidden');
                    isDropdownOpen2 = false;
                }
            });
        });
    </script>
</div>
