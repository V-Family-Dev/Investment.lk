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
                                    <th class="min-width-80">#</th>
                                    <th class="min-width-150">First name</th>
                                    <th class="min-width-150">Last name</th>
                                    <th class="min-width-120">User type</th>
                                    <th class="min-width-160">ID number</th>
                                    <th class="min-width-200">Address</th>
                                    <th class="min-width-130">Phone number</th>
                                    <th class="min-width-150">Email</th>
                                    <th class="min-width-140">Email verified at</th>
                                    <th class="min-width-100">Status</th>
                                    <th class="min-width-100">Front of NIC</th>
                                    <th class="min-width-160">Back of NIC</th>
                                    <th class="min-width-200">Created at</th>
                                    <th class="min-width-200">Updated at</th>
                                    <th class="min-width-180">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->usertype }}</td>
                                <td>{{ $user->idnumber }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phonenumber }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td><span class="badge text-bg-{{ $user->status ? 'success' : 'danger' }}">{{ $user->status ? 'Active':'Inactive' }}</span></td>

                                {{-- Display NIC images only if usertype is 'seller' --}}
                                @if($user->usertype === 'seller')
                                    <td>
                                        @if($user->front_fide_if_card)
                                            <img src="{{ asset('storage/' . $user->front_fide_if_card) }}" alt="Front of NIC"
                                                style="width: 100px; cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#imageModal"
                                                onclick="showImage('{{ asset('storage/' . $user->front_fide_if_card) }}')">
                                        @else
                                            Not Available
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->back_fide_if_card)
                                            <img src="{{ asset('storage/' . $user->back_fide_if_card) }}" alt="Back of NIC"
                                                style="width: 100px; cursor: pointer;" data-bs-toggle="modal"
                                                data-bs-target="#imageModal"
                                                onclick="showImage('{{ asset('storage/' . $user->back_fide_if_card) }}')">
                                        @else
                                            Not Available
                                        @endif
                                    </td>
                                @else
                                    <td colspan="2">Not Applicable</td>
                                @endif


                                <td>{{ $user->created_at->format('F j, Y, g:i a') }}</td>
                                <td>{{ $user->updated_at->format('F j, Y, g:i a') }}</td>
                                <td>
                                    <button class="btn btn-primary btn-icon view-details-btn">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn btn-info btn-icon view-details-btn ms-2" onclick="showDetails({{ $user->id }})"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button class="btn btn-danger btn-icon view-details-btn ms-2" onclick="deleteItem({{ $user->id }}, this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <button class="btn btn-{{ $user->status ? 'danger' : 'success' }} btn-icon view-details-btn ms-2" onclick="changeStatus({{ $user->id }}, '{{ $user->status ? 0 : 1 }}')">
                                        <i class="fa-solid fa-{{ $user->status ? 'x' : 'check' }}"></i>
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

        function deleteItem(propertyId, element) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log("🚀 ~ deleteItem ~ result:", result)
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("property.active.update") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: propertyId,
                            active_or_not: 0
                        },
                        success: function (response) {
                        console.log("🚀 ~ deleteItem ~ response:", response);

                            if(response.active_or_not == 0){
                                $(element).parent().closest('tr').remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Property has been deleted.',
                                    'success'
                                )
                            }else{
                                Swal.fire(
                                    'Failed!',
                                    response.message,
                                    'error'
                                )
                            }
                        },
                        error: function (error) {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Something went wrong!',
                                'error'
                            )
                        }
                    });
                }
            })

        }

        function changeStatus(propertyId, newStatus) {
        console.log("🚀 ~ changeStatus ~ propertyId:", propertyId)

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change status of this property!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("property.status.update") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: propertyId,
                            status: newStatus
                        },
                        success: function (response) {
                            // Update button text and color based on new status
                            Swal.fire(
                                'Changed!',
                                'Status has been changed.',
                                'success'
                            )
                            location.reload();
                        },
                        error: function (xhr) {
                            console.error('Error:', xhr);
                            Swal.fire(
                                'Error!',
                                'Something went wrong!',
                                'error'
                            )
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>