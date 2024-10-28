<!DOCTYPE html>
<html lang="en">
<head>
<x-adminpanelcomponents.header-tags />
</head>
<body>
    <div class="vh-100 vw-100 bg-light d-flex overflow-hidden">
        <x-adminpanelcomponents.sidebar />
        <div class="overflow-x-hidden vh-100 flex-fill position-relative main-container d-flex flex-column">
            <x-adminpanelcomponents.header-bar path="User management / User list" />
            <div class="overflow-y-scroll overflow-x-hidden flex-fill py-5">
                <div class="bg-white p-5 rounded-4 shadow  main-content">
                    <div class="fs-6 text-secondary">Property manage</div>
                    <div class="fs-3 fw-semibold mb-5">Property list</div>

                    <div >
                        <div class="mb-3">
                            <table id="example" class="table table-striped"  >
                                <thead>
                                    <tr>
                                        <th class="min-width-100">ID</th>
                                        <th class="min-width-150">Property ID</th>
                                        <th class="min-width-180">Category Name</th>
                                        <th class="min-width-200">Added by</th>
                                        <th class="min-width-150">Payment ID</th>
                                        <th class="min-width-200">Payment status</th>
                                        <th class="min-width-100">Details</th>
                                        <th class="min-width-100">Status</th>
                                        <th class="min-width-100">Actions</th>
                                        <th class="min-width-250">Created at</th>
                                        <th class="min-width-250">Updated at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($propertyManages as $propertyManage)
                                    <tr>
                                        <td>{{ $propertyManage->id }}</td>
                                        <td>{{ $propertyManage->property_id }}</td>
                                        <td>{{ $propertyManage->category_name }}</td>
                                        <td>{{ $propertyManage->user->firstname ?? 'unknown' }} {{ $propertyManage->user->lastname ?? 'unknown' }}</td>
                                        <td>{{ $propertyManage->ads_payment_id }}</td>
                                        <td><span class="badge text-bg-{{ $propertyManage->status == 'pending' ? 'danger' : 'success' }}">{{ $propertyManage->status == 'pending' ? 'Pending' : 'Active' }}</span></td>
                                        <td>{{ $propertyManage->ads_payment_status }}</td>
                                        <td>{{ $propertyManage->active_or_not ? 'Active' : 'Inactive' }}</td>
                                        <!-- <td>
                                            <a href="{{ route('ad.details', ['property_id' => $propertyManage->property_id, 'category_name' => $propertyManage->category_name]) }}"
                                            class="btn btn-info">View Details</a>
                                        </td> -->
                                        
                                        <td>{{ $propertyManage->created_at->format('F j, Y, g:i a') }}</td>
                                        <td>{{ $propertyManage->updated_at->format('F j, Y, g:i a') }}</td>
                                        <td>
                                            <button class="btn btn-info view-details-btn" onclick="showDetails({{ $propertyManage->property_id }}, '{{ $propertyManage->category_name }}')"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Property details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="property-modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>
        $(document).ready(function(){
            $('#example').DataTable();
        });

        function showDetails(propertyId, categoryName) {

                $.ajax({
                    url: `/ad-details/${propertyId}/${categoryName}`,
                    type: 'GET',
                    success: function (data) {
                        console.log("🚀 ~ showDetails ~ data:", data)

                        if (data.error) {
                            alert('Error fetching ad details');
                            return;
                        }

                        $("#property-modal-body").html("");
                        let content = "";

                        // Loop through each property
                        $.each(data, function (key, value) {
                            let valueHtml = value ? value : 'N/A';

                            if (key === 'image_path' && value.includes(',')) {
                                // Handle multiple images
                                const images = value.split(',');
                                content+=`<p><strong>Images:</strong></p>`;
                                $.each(images, function (index, image) {
                                    content+=`<img src="/storage/${image.trim()}" alt="Image" class="img-fluid mb-2" style="max-width: 100%; height: auto;">`;
                                });
                            } else if (key === 'image_path') {
                                // Single image case
                                content+=`<p><strong>Image:</strong> <img src="/storage/${value}" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;"></p>`;
                            } else {
                                content+= `<div class="d-flex mb-3"><div class="col-4 text-secondary"><strong>${key.replace('_', ' ')}</strong></div><div class="fw-bold me-1">:</div><div class="flex-fill"> ${valueHtml}</div></div>`;
                            }
                        });

                        $("#property-modal-body").html(content);
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
        }
    </script>
</body>
</html>