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
                        <form action="">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder=""/>
                            </div>
                            <div class="d-flex justify-content-end w-full">
                                <button class="btn btn-warning">
                                    Submit
                                </button>
                            </div>
                        </form>
                        
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