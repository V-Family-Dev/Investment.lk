<!DOCTYPE html>
<html lang="en">
<head>
<x-adminpanelcomponents.header-tags />
</head>
<body>
    <div class="vh-100 vw-100 bg-light d-flex overflow-hidden">
        <x-adminpanelcomponents.sidebar />
        <div class="overflow-x-hidden vh-100 flex-fill position-relative main-container d-flex flex-column">
            <x-adminpanelcomponents.header-bar path="Property management / Property list" />
            <div class="overflow-y-scroll overflow-x-hidden flex-fill py-5">
                <div class="bg-white p-5 rounded-4 shadow  main-content">
                    <div class="fs-6 text-secondary">Property manage</div>
                    <div class="fs-3 fw-semibold mb-5">Property list</div>

                    <div >
                        <div class="mb-3">
                            <table id="example" class="table table-striped"  >
                                <thead>
                                    <tr>
                                        <th class="min-width-100">#</th>
                                        <th class="min-width-150">Category Name</th>
                                        <th class="min-width-200">Added by</th>
                                        <th class="min-width-150">Payment ID</th>
                                        <th class="min-width-150">Payment status</th>
                                        <th class="min-width-100">Status</th>
                                        <th class="min-width-250">Created at</th>
                                        <th class="min-width-250">Updated at</th>
                                        <th class="min-width-180">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($propertyManages as $propertyManage)
                                    @if($propertyManage->active_or_not == 1)
                                    <tr>
                                        <td>{{ $propertyManage->id }}</td>
                                        <td>{{ $propertyManage->category_name }}</td>
                                        <td>{{ $propertyManage->user->firstname ?? 'unknown' }} {{ $propertyManage->user->lastname ?? 'unknown' }}</td>
                                        <td>{{ $propertyManage->ads_payment_id }}</td>
                                        <td><span
                                            class="badge {{Auth::user()->usertype != "admin"?'disabled':''}} cursor-pointer text-bg-{{ $propertyManage->ads_payment_status == 'Paid'?'primary':'danger' }}">
                                            {{ $propertyManage->ads_payment_status }}
                                        </span></td>
                                        <!-- <td>
                                            <a href="{{ route('ad.details', ['property_id' => $propertyManage->property_id, 'category_name' => $propertyManage->category_name]) }}"
                                            class="btn btn-info">View Details</a>
                                        </td> -->

                                        <td><span class="badge cursor-pointer  text-bg-{{ $propertyManage->status == 'pending' ? 'danger' : 'success' }}"  >{{ $propertyManage->status == 'pending' ? 'Pending' : 'Active' }}</span></td>
                                        <td>{{ $propertyManage->created_at->format('F j, Y, g:i a') }}</td>
                                        <td>{{ $propertyManage->updated_at->format('F j, Y, g:i a') }}</td>
                                        <td>
                                            <button
                                                class="btn btn-primary btn-icon view-details-btn"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="Edit Proprty">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button
                                                class="btn btn-info btn-icon view-details-btn ms-2"
                                                onclick="showDetails({{ $propertyManage->property_id }}, '{{ $propertyManage->category_name }}')"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="View Details">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-success btn-icon add-payment-btn ms-2"
                                                data-property-id="{{ $propertyManage->property_id }}"
                                                data-category-name="{{ $propertyManage->category_name }}"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="Add payment">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endif
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

    <!-- Payment add Modal -->
    <div class="modal fade" id="paymentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Payment details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="property-modal-body">
            <form id="payment-add-form" action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="property_id" id="propertyIdInput">
                <input type="hidden" name="category_name" id="categoryNameInput">
                <div class="mb-3">
                    <label for="" class="form-label">Amount</label>
                    <input type="number" name="amount" placeholder="Amount" class="form-control" required="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Payment slip image</label>
                    <div class="form-file-input d-flex align-items-center">
                        <input type="file" multiple id="slip_image" name="slip_image" placeholder="" class="d-none">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                        <span id="payment-file-select" class="ps-3 flex-fill text-truncate d-block">Select file</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add-payment-submit-button">Save changes</button>
        </div>
        </div>
    </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>
        $(document).ready(function(){
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            $('#example').DataTable();
        });

        function showDetails(propertyId, categoryName) {
                $('#exampleModal').modal('show');
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
                                const images = value.split(',');
                                content+=`<p class="text-secondary"><strong>Images:</strong></p>`;
                                $.each(images, function (index, image) {
                                    content+=`<img src="/storage/${image.trim()}" alt="Image" class="my-2 w-100 h-auto rounded-3 shadow" >`;
                                });
                            } else if (key === 'image_path') {
                                content+=`<p class="text-secondary"><strong>Image:</strong> <img src="/storage/${value}" alt="Image" class="my-2 w-100 h-auto rounded-3 shadow"></p>`;
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

        $('.status-change-button').on('click', function(){
            console.log("🚀 ~ $ ~ $(this).data('property-status'):", $(this).data('property-status'))
            console.log("🚀 ~ $ ~ $(this).data('property-id'):", $(this).data('property-id'))
            let element = this;

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
                            id: $(this).data('property-id'),
                            status: $(this).data('property-status') == 'pending'?'Active':'pending'
                        },
                        success: function (response) {
                            // Update button text and color based on new status
                            $(element).removeClass($(element).data('property-status') == 'pending'? 'text-bg-danger' : 'text-bg-success');
                            $(element).addClass($(element).data('property-status') == 'pending'? 'text-bg-success' : 'text-bg-danger');
                            $(element).text($(element).data('property-status') == 'pending'? 'Active' : 'pending');
                            $(element).data('property-status', $(element).data('property-status') == 'pending'?'Active':'pending');
                            Swal.fire(
                                'Changed!',
                                'Status has been changed.',
                                'success'
                            )

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
        });
        $('.payment-status-change-button').on('click', function(){
            console.log("🚀 ~ $ ~ $(this).data('property-status'):", $(this).data('property-status'))
            console.log("🚀 ~ $ ~ $(this).data('property-id'):", $(this).data('property-id'))
            let element = this;

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change payment status of this property!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("property.payment.update") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: $(this).data('property-id'),
                            status: $(this).data('property-status') == 'Paid'?'Not Paid':'Paid'
                        },
                        success: function (response) {
                            // Update button text and color based on new status
                            $(element).removeClass($(element).data('property-status') == 'Paid'? 'text-bg-primary' : 'text-bg-danger');
                            $(element).addClass($(element).data('property-status') == 'Paid'? 'text-bg-danger' : 'text-bg-primary');
                            $(element).text($(element).data('property-status') == 'Paid'? 'Not paid' : 'Paid');
                            $(element).data('property-status', $(element).data('property-status') == 'Paid'?'Not Paid':'Paid');
                            Swal.fire(
                                'Changed!',
                                'Status has been changed.',
                                'success'
                            )

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
        });

        $('.add-payment-btn').on('click', function(){
            $('#paymentAddModal').modal('show');
            console.log("clicken gh");
            $('#categoryNameInput').val($(this).data('category-name'));
            $('#propertyIdInput').val($(this).data('property-id'));
        });
        $('.add-payment-submit-button').on('click', function(){
            console.log("clicken submit");

            // Manually submit the form
            var form = document.getElementById('payment-add-form');
            var formData = new FormData(form);

            $.ajax({
                url: form.action,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                console.log("🚀 ~ $ ~ data:", data)

                    Swal.fire(
                        'Success!',
                        'Payment successfully added.',
                        'success'
                    ).then((result)=>{
                        $('#paymentAddModal').modal('hide');
                        $('[name="amount"]').val('');
                        $('#payment-file-select').html('Select file');
                    });
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    Swal.fire(
                        'Error!',
                        'Something went wrong!',
                        'error'
                    ).then((result)=>{
                        $('#paymentAddModal').modal('hide');
                        $('[name="amount"]').val('');
                        $('#payment-file-select').html('Select file');
                    });
                }
            });
        });
    </script>
</body>
</html>
