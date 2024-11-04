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
                    <div class="fs-6 text-secondary">User management</div>
                    <div class="fs-3 fw-semibold mb-5">User list</div>

                    <div>
                        <div class="mb-3">
                            <table id="example" class="table table-striped">
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
                                        <th class="min-width-220">Email verified at</th>
                                        <th class="min-width-220">Created at</th>
                                        <th class="min-width-220">Updated at</th>
                                        <th class="min-width-100">Status</th>
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
                                            <td>{{ $user->email_verified_at->format('F j, Y, g:i a') }}</td>
                                            <td>{{ $user->created_at->format('F j, Y, g:i a') }}</td>
                                            <td>{{ $user->updated_at->format('F j, Y, g:i a') }}</td>
                                            <td><span
                                                    class="badge text-bg-{{ $user->status ? 'success' : 'danger' }}">{{ $user->status ? 'Active' : 'Inactive' }}</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-icon view-details-btn">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                <button class="btn btn-info btn-icon view-details-btn ms-2"
                                                    onclick="showDetails({{ $user->id }}, '{{ asset('storage/' . $user->front_fide_if_card) }}', '{{ asset('storage/' . $user->back_fide_if_card) }}')"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                                <button class="btn btn-danger btn-icon view-details-btn ms-2"
                                                    onclick="deleteUser({{ $user->id }})">
                                                    <i class="fa-solid fa-trash"></i>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">User details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="property-modal-body">
                    <div><strong>ID front side:</strong></div>
                    <img src="" alt="Image" class="w-100 h-auto d-block  mt-1 mb-4 rounded-3 shadow" id="id_front_side">
                    <div><strong>ID back side:</strong></div>
                    <img src="" alt="Image" class="w-100 h-auto d-block mt-1  mb-4 rounded-3 shadow" id="id_front_back">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

        function showDetails(id, idFront, idBack) {
            $("#id_front_side").attr("src", idFront);
            $("#id_front_back").attr("src", idBack);
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

                            if (response.active_or_not == 0) {
                                $(element).parent().closest('tr').remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Property has been deleted.',
                                    'success'
                                )
                            } else {
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












        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                fetch(`/users/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            alert(data.message);
                            location.reload(); // Reload the page to reflect changes
                        }
                    })
                    .catch(error => {
                        console.error("Error deleting user:", error);
                        alert("An error occurred while trying to delete the user.");
                    });
            }
        }










    </script>
</body>

</html>
