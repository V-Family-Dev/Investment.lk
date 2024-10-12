<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/adminPanel/main.css')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="vh-100 vw-100 bg-light d-flex overflow-hidden">
        <div class="sidebar shadow-sm bg-white z-1">
            <div class="p-4 fs-4 fw-bold">
            Investment Lanka
            </div>
            <div class="accordion" >
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        User Management
                    </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <a href="">User add</a>
                       <a href="">User list</a>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                        Property Management
                    </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <a href="">Property add</a>
                        <a href="">Property list</a>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                        User Payment Management
                    </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <a href="">User Payment add</a>
                        <a href="">User Payment list</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-hidden vh-100 flex-fill position-relative main-container d-flex flex-column">
            <div class="header-bar w-100 bg-white shadow-sm d-flex align-items-center px-3 justify-content-between">
                <div class="text-secondary fs-6">
                    admin <i class="fa-solid fa-arrow-right"></i> dashboard
                </div>
                <div>
                    <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="40" height="40" src="{{ asset('images/person/zak.png') }}" alt="" class="rounded-circle object-fit-cover" >
                        <i class="fa-solid fa-caret-down ps-2 text-secondary"></i>
                        <div class="dropdown">
                            <ul class="dropdown-menu mt-3">
                                <li class="">
                                    <a class="dropdown-item d-flex py-3" href="#">
                                        <img width="60" height="60" src="{{ asset('images/person/zak.png') }}" alt="" class=" rounded-circle object-fit-cover ">
                                        <div class="ps-3">
                                            <div>name name</div>
                                            <div class="text-secondary">
                                                example@gmail.com
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between align-items-center py-2" href="#">
                                        <div>Logout</div> 
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-y-scroll overflow-x-hidden flex-fill">
                <div class="bg-white p-4 rounded-4 shadow m-5">
                    <div class="fs-6 text-secondary">title</div>
                    <div class="fs-5">title title</div>

                    <div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name=""
                                id=""
                                aria-describedby="helpId"
                                placeholder=""
                            />
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/adminPanel/main.js') }}"></script>
    <script>

    </script>
</body>
</html>