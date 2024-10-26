<!DOCTYPE html>
<html lang="en">
<head>
<x-adminpanelcomponents.header-tags />
</head>
<body>
    <div class="vh-100 vw-100 bg-light d-flex overflow-hidden">
        <x-adminpanelcomponents.sidebar />
        <div class="overflow-x-hidden vh-100 flex-fill position-relative main-container d-flex flex-column">
            <x-adminpanelcomponents.header-bar path="admin / dashboard" />
            <div class="overflow-y-scroll overflow-x-hidden flex-fill main-content-container py-5">
                <div class="bg-white p-5 rounded-4 shadow  main-content">
                    <div class="fs-6 text-secondary">title</div>
                    <div class="fs-3 fw-semibold">title title</div>

                    <div>
                            <div class="mb-3">
                                <label for="" class="form-label">Type</label>
                                <select name="" id="type" class="form-select">
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
                            </div>
                        <!-- factory add -->
                        <form data-form-id="1" style="display:none" action="{{ url('factorysale') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Property Type</label>
                                    <input type="text" name="property_type" placeholder="Property Type" class="form-control" required="">
                                </div>
                            </div>             
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" name="price" placeholder="Price" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>


                        <!-- apartment add -->
                        <form data-form-id="2" style="display:none" action="{{ url('apartment-sales') }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Bedrooms</label>
                                    <input type="number" name="bedrooms" placeholder="Bedrooms" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Bathrooms</label>
                                    <input type="number" name="bathrooms" placeholder="Bathrooms" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" name="price" placeholder="Price" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- luxury houses -->
                        <form data-form-id="3" style="display:none" action="{{ route('luxury-houses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Bedrooms</label>
                                    <input type="number" name="bedrooms" placeholder="Bedrooms" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Bathrooms</label>
                                    <input type="number" name="bathrooms" placeholder="Bathrooms" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">House Size</label>
                                    <input type="text" name="house_size" placeholder="House Size" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Land Size</label>
                                    <input type="text" name="land_size" placeholder="Land Size" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- bungalow sales -->
                        <form data-form-id="4" style="display:none" action="{{ url('bungalow-sales') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Bedrooms</label>
                                    <input type="number" name="bedrooms" placeholder="Bedrooms" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Bathrooms</label>
                                    <input type="number" name="bathrooms" placeholder="Bathrooms" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">House Size</label>
                                    <input type="text" name="house_size" placeholder="House Size" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Land Size</label>
                                    <input type="text" name="land_size" placeholder="Land Size" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- hotel sales -->
                        <form data-form-id="5" style="display:none" action="{{ url('hotel-sales') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Property Type</label>
                                    <input type="text" name="property_type" placeholder="Property Type" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" name="price" placeholder="Price" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Property Features</label>
                                <textarea name="property_features" placeholder="Property Features" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- landsales -->
                        <form data-form-id="6" style="display:none" action="{{ url('landsales') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Land Type</label>
                                    <input type="text" name="land_type" placeholder="Land Type" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Land Size</label>
                                    <input type="text" name="land_size" placeholder="Land Size" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" name="price" placeholder="Price" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- industrial_vehicles/store -->
                        <form data-form-id="7" style="display:none" action="{{ route('vehical.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Vehical Name</label>
                                    <input type="text" name="vehical_name" placeholder="Vehical Name" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Brand</label>
                                    <input type="text" name="brand" placeholder="Brand" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Condition</label>
                                <input type="text" name="condtion" placeholder="Condition" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Model</label>
                                    <input type="text" name="model" placeholder="Model" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Year</label>
                                    <input type="text" name="year" placeholder="Year" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Fuel Type</label>
                                    <input type="text" name="fual_type" placeholder="Fuel Type" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Mileage</label>
                                    <input type="text" name="mileage" placeholder="Mileage" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Color</label>
                                    <input type="text" name="color" placeholder="Color" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Engine Capacity</label>
                                    <input type="text" name="engine_capacity" placeholder="Engine Capacity" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Body type</label>
                                    <input type="text" name="bodytype" placeholder="Bodytype" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Edition</label>
                                    <input type="text" name="edition" placeholder="Edition" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Transmisson</label>
                                    <input type="text" name="transmisson" placeholder="Transmisson" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- plantation_sales/store -->
                        <form data-form-id="8" style="display:none" action="{{ route('plantation_sales.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Plantation Type</label>
                                    <input type="text" name="plantation_type" placeholder="Plantation Type" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>


                        <!-- equipment_sales/store -->
                        <form data-form-id="9" style="display:none" action="{{ url('equipment_sales_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Equipment Name</label>
                                    <input type="text" name="equipment_name" placeholder="Equipment Name" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Brand</label>
                                    <input type="text" name="brand" placeholder="Brand" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- apartment_rentals_store -->
                        <form data-form-id="10" style="display:none" action="{{ route('apartment-rentals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Rent Price</label>
                                    <input type="number" name="rent_price" placeholder="Rent Price" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Features</label>
                                <textarea name="features" placeholder="Features" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- house_rentals_store -->
                        <form data-form-id="11" style="display:none" action="{{ route('house-rentals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Rent Price</label>
                                    <input type="number" name="rent_price" placeholder="Rent Price" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Features</label>
                                <textarea name="features" placeholder="Features" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>


                        <!-- room_rentals_store -->
                        <form data-form-id="12" style="display:none" action="{{ route('room_rentals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="Title" class="form-control" required="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" placeholder="Location" class="form-control" required="">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Rent Price</label>
                                    <input type="number" name="rent_price" placeholder="Rent Price" class="form-control" required="">
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Size</label>
                                    <input type="text" name="size" placeholder="Size" class="form-control" required="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Features</label>
                                <textarea name="features" placeholder="Features" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" required="" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <div class="form-file-input d-flex align-items-center">
                                    <input type="file" id="img" name="image[]" placeholder="" class="d-none" multiple>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="ps-3 flex-fill text-truncate d-block">Select file</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Contact Details</label>
                                <input type="text" name="contact_details" placeholder="Contact Details" class="form-control" required="">
                            </div>
                            <div class="d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        


                        
                    </div>
                </div>
            </div>

        </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>
        $(document).ready(function(){
            $("#type").change(function(){
                var type = $(this).val();
                console.log("🚀 ~ $ ~ type:", type)
                $('[data-form-id]').hide();
                console.log("🚀 ~ $ ~ $('[data-form-id]').hide();:", $('[data-form-id]').hide())
                $('[data-form-id="'+type+'"]').show();
            });
        });
    </script>
</body>
</html>