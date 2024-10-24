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
            <div class="overflow-y-scroll overflow-x-hidden flex-fill">
                <div class="bg-white p-4 rounded-4 shadow m-5">
                    <div class="d-flex">
                        <img width="150" height="150" class="object-fit-cover rounded-3 d-block shadow" src="{{ asset('images/plant1.png') }}" alt="">
                        <div class="ms-3">
                            <div class="fw-semibold fs-4">Name Name</div>
                            <div class="mt-3 text-secondary">
                                <div class="d-flex align-items-center"><i class="col-1 fa-solid fa-user"></i><span class="ms-3" >Admin</span></div>
                                <div class="d-flex align-items-center"><i class="col-1 fa-solid fa-envelope"></i><span class="ms-3">admin@samplmail.com</span></div>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-primary">Edit profile</button>
                        </div>
                    </div>

                    <div>
                        <div class="w-100">
                            <div class="fw-semibold fs-5 border-bottom w-100 py-2 mt-3">
                                Profile Details
                            </div>
                            <div>
                                <div class="row mb-3 mt-3">
                                    <div class="col-4 text-secondary">First name</div>
                                    <div class="col-8 fw-semibold">Name Name</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 text-secondary">Last Name</div>
                                    <div class="col-8 fw-semibold">Name Name</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 text-secondary">Email</div>
                                    <div class="col-8 fw-semibold">namename@example.com</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 text-secondary">ID number</div>
                                    <div class="col-8 fw-semibold">20005689755</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 text-secondary">Address</div>
                                    <div class="col-8 fw-semibold">SF, Bay Area</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 text-secondary">Phone number</div>
                                    <div class="col-8 fw-semibold">+94 75 68 525</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <x-adminpanelcomponents.script-tags />
    <script>

    </script>
</body>
</html>