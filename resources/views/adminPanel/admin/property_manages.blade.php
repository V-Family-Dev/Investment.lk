<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <title>Sign Up</title>

    <style>
        body {
            background-image: url('{{ asset('images/property/anju/propertyDetailBackgroundphoto.png') }}');
            background-size: cover;
            background-position: center;
        }

        @layer utilities {
            .bg-primary {
                background-color: #FFCC00;
            }

            .bg-secondary {
                background-color: #ECBD00;
            }

            .text-accent {
                color: #CC9900;
            }

            .bg-accent {
                background-color: #CC9900;
            }

            .hover-bg-darkaccent:hover {
                background-color: #B8860B;
            }

            .focus-border-darkaccent:focus {
                border-color: #B8860B;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="flex-shrink-0 mb-[140px]">
        <x-headerbar />
        <x-title-area title="Sign Up" subtitle="Home - Sign Up"
            image="{{ asset('images/property/anju/ImagepropertyDetailheaderphoto.png') }}" />
    </header>

    <!-- Sign Up Form -->
    <div class="container">

        <h2>Property Management</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <!-- <th>Property ID</th> -->
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Ads Payment ID</th>
                    <th>Ads Payment Status</th>
                    <th>Active / Delete</th>
                    <th>View Property Details</th>
                    <th>View Payment details</th>

                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propertyManages as $propertyManage)
                    <tr>
                        <td>{{ $propertyManage->id }}</td>
                        <td>{{ $propertyManage->category_name }}</td>
                        <!-- <td>{{ $propertyManage->property_id }}</td> -->
                        <td>{{ $propertyManage->user->firstname }} {{ $propertyManage->user->lastname }}</td>
                        <!-- <td>{{ $propertyManage->status == 'pending' ? 'Pending' : 'Active' }}</td> -->
                        <td>
                            <button
                                class="btn btn-status-toggle {{ $propertyManage->status == 'pending' ? 'btn-warning' : 'btn-success' }}"
                                data-id="{{ $propertyManage->id }}" data-status="{{ $propertyManage->status }}">
                                {{ $propertyManage->status == 'pending' ? 'Pending' : 'Active' }}
                            </button>
                        </td>

                        <td>{{ $propertyManage->ads_payment_id }}</td>
                        <td>
                            <button
                                class="btn btn-payment-toggle {{ $propertyManage->ads_payment_status == 'Paid' ? 'btn-success' : 'btn-danger' }}"
                                data-id="{{ $propertyManage->id }}"
                                data-status="{{ $propertyManage->ads_payment_status == 'Paid' ? 'Paid' : 'Not Paid' }}">
                                {{ $propertyManage->ads_payment_status == 'Paid' ? 'Paid' : 'Not Paid' }}
                            </button>
                        </td>

                        <!-- <td>{{ $propertyManage->active_or_not ? 'Active' : 'Inactive' }}</td> -->
                        <td>
                            <button
                                class="btn btn-active-toggle {{ $propertyManage->active_or_not ? 'btn-success' : 'btn-danger' }}"
                                data-id="{{ $propertyManage->id }}" data-active="{{ $propertyManage->active_or_not }}">
                                {{ $propertyManage->active_or_not ? 'Active' : 'Deleted' }}
                            </button>
                        </td>

                        <!-- <td>
                                                            <a href="{{ route('ad.details', ['property_id' => $propertyManage->property_id, 'category_name' => $propertyManage->category_name]) }}"
                                                               class="btn btn-info">View Details</a>
                                                        </td> -->
                        <td><button class="btn btn-info view-details-btn" data-id="{{ $propertyManage->property_id }}"
                                data-category="{{ $propertyManage->category_name }}">View Details</button></td>
                        <td>
                            <button class="btn btn-primary view-payment-btn" data-property-id="{{ $propertyManage->id }}"
                                data-category-name="{{ $propertyManage->category_name }}">
                                View Payment Details
                            </button>
                        </td>

                        <td>{{ $propertyManage->created_at }}</td>
                        <td>{{ $propertyManage->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Structure -->
        <div class="modal fade" id="adDetailsModal" tabindex="-1" role="dialog" aria-labelledby="adDetailsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="adDetailsModalLabel">Ad Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="adDetailsContent">
                        <!-- Ad details will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment Details Modal -->
    <div class="modal fade" id="paymentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="paymentDetailsLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentDetailsLabel">Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="paymentDetailsContent">
                    <!-- Payment details will load here -->
                    <p><strong>Amount:</strong> <span id="paymentAmount"></span></p>
                    <p><strong>Slip Image:</strong></p>
                    <img id="paymentSlipImage" src="" alt="Payment Slip" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-[119px]">
        <x-footer bgimage='images/building/build8.png' />
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.view-details-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const propertyId = this.getAttribute('data-id');
                    const categoryName = this.getAttribute('data-category');

                    fetch(`/ad-details/${propertyId}/${categoryName}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                alert('Error fetching ad details');
                                return;
                            }

                            const adDetailsContent = document.getElementById('adDetailsContent');
                            adDetailsContent.innerHTML = '';

                            // Loop through each property
                            Object.keys(data).forEach(key => {
                                let value = data[key] ? data[key] : 'N/A';

                                if (key === 'image_path' && value.includes(',')) {
                                    // Handle multiple images
                                    const images = value.split(',');
                                    adDetailsContent.innerHTML += `<p><strong>Images:</strong></p>`;
                                    images.forEach(image => {
                                        adDetailsContent.innerHTML += `<img src="/storage/${image.trim()}" alt="Image" class="img-fluid mb-2" style="max-width: 100%; height: auto;">`;
                                    });
                                } else if (key === 'image_path') {
                                    // Single image case
                                    adDetailsContent.innerHTML += `<p><strong>Image:</strong> <img src="/storage/${value}" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;"></p>`;
                                } else {
                                    adDetailsContent.innerHTML += `<p><strong>${key}:</strong> ${value}</p>`;
                                }
                            });

                            $('#adDetailsModal').modal('show');
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });





        $(document).on('click', '.btn-status-toggle', function () {
            var button = $(this);
            var propertyId = button.data('id');
            var newStatus = button.data('status') === 'pending' ? 'active' : 'pending';

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
                    if (response.status === 'active') {
                        button.removeClass('btn-warning').addClass('btn-success').text('Active');
                        button.data('status', 'active');
                    } else {
                        button.removeClass('btn-success').addClass('btn-warning').text('Pending');
                        button.data('status', 'pending');
                    }
                },
                error: function (xhr) {
                    alert('Failed to update status');
                }
            });
        });


        $(document).on('click', '.btn-active-toggle', function () {
            var button = $(this);
            var propertyId = button.data('id');
            var newActiveStatus = button.data('active') === 1 ? 0 : 1;

            $.ajax({
                url: '{{ route("property.active.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: propertyId,
                    active_or_not: newActiveStatus
                },
                success: function (response) {
                    // Update button text and color based on new active status
                    if (response.active_or_not === 1) {
                        button.removeClass('btn-danger').addClass('btn-success').text('Active');
                        button.data('active', 1);
                    } else {
                        button.removeClass('btn-success').addClass('btn-danger').text('Deleted');
                        button.data('active', 0);
                    }
                },
                error: function (xhr) {
                    alert('Failed to update active status');
                }
            });
        });



        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.view-payment-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const propertyId = this.getAttribute('data-property-id');
                    const categoryName = this.getAttribute('data-category-name');

                    // Fetch payment details via AJAX
                    fetch(`/payment-details?property_id=${propertyId}&category_name=${categoryName}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.error) {
                                alert('Error fetching payment details');
                                return;
                            }

                            document.getElementById('paymentAmount').textContent = data.amount;
                            document.getElementById('paymentSlipImage').src = `/storage/${data.slip_image}`;

                            $('#paymentDetailsModal').modal('show');
                        })
                        .catch(error => console.error('Error:', error));

                });
            });
        });


        $(document).on('click', '.btn-payment-toggle', function () {
    var button = $(this);
    var propertyId = button.data('id');
    var newStatus = button.data('status') === 'Paid' ? 'Not Paid' : 'Paid';

    $.ajax({
        url: '{{ route("property.payment.update") }}', // Define this route in web.php
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: propertyId,
            status: newStatus
        },
        success: function (response) {
            // Update button text and color based on new status
            if (response.status === 'Paid') {
                button.removeClass('btn-danger').addClass('btn-success').text('Paid');
                button.data('status', 'Paid');
            } else {
                button.removeClass('btn-success').addClass('btn-danger').text('Not Paid');
                button.data('status', 'Not Paid');
            }
        },
        error: function () {
            alert('Failed to update payment status');
        }
    });
});







    </script>



</body>

</html>