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
                    <div class="fs-6 text-secondary">title</div>
                    <div class="fs-3 fw-semibold">title title</div>

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
                                                        <img src="{{ asset('storage/' . $user->front_fide_if_card) }}"
                                                            alt="Front of NIC" style="width: 100px;">
                                                    @else
                                                        Not Available
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->back_fide_if_card)
                                                        <img src="{{ asset('storage/' . $user->back_fide_if_card) }}"
                                                            alt="Back of NIC" style="width: 100px;">
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
            </div>

        </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>
        new DataTable('#example');
    </script>
</body>

</html>