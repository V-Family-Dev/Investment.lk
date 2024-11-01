<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <title>Login</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    <x-headerbar />
    <x-title-area title="Login" subtitle="Home - Login" image="images/building/build1.jpg" />

    <div class="flex items-center justify-center min-h-screen bg-secondary py-16">

        <div>
            <div class="mb-3">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Type</th>
                            <th>ID Number</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Email Verified At</th>
                            <th>Status</th>
                            <th>Front of NIC</th>
                            <th>Back of NIC</th>
                            <th>Created At</th>
                            <th>Updated At</th>
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
                                <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>

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


                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> -->
                </table>
            </div>

        </div>
    </div>

    <x-footer bgimage='images/building/build8.png' />
    <!-- Modal for Image Popup -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <img id="modalImage" src="" alt="NIC Image" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </div>

    <script>
        <!-- Script to set modal image source -->
        <script>
            function showImage(src) {
                document.getElementById('modalImage').src = src;
    }
    </script>
    </script>
</body>

</html>