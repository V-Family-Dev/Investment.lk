<div class="h-auto flex items-start flex-col justify-center bg-center bg-cover" style="background-image: url('{{ asset($image) }}');">
    <div class="flex flex-col px-20 my-10 ">
        <span class="text-4xl md:text-6xl text-white  text-shadow-lg font-bold">{{ $title }}</span>
        <span class="text-sm text-white text-shadow-lg ">{{ $subtitle }}</span>
    </div>
    <form  action="#" class="w-full block my-4 px-20 {{ $showform=='1'  ? '':'hidden'}}">
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
</div>
