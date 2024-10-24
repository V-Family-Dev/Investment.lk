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
                        <img width="150" height="150" class="object-fit-cover rounded-3 d-block" src="{{ asset('images/plant1.png') }}" alt="">
                        <div>
                            <div>Name Name</div>
                            <div>
                                <div>Admin</div>
                                <div>admin@sampplemail.com</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex">
                            <div>
                                Profile Details
                            </div>
                            <button class="btn btn-primary">Edit</button>
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