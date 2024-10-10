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
        <div class="overflow-y-scroll overflow-x-hidden vh-100 flex-fill position-relative main-container">
            <div class="position-fixed top-50 left-0  shadow-sm w-100 header-bar px-3 bg-success">
                ddf
                <!-- <div class="d-flex justify-content-between align-items-center w-50">
                    <div>
                        admin - dashboard
                    </div>
                    <div>
                        <img width="50" height="50" src="{{ asset('images/person/zak.png') }}" alt="">
                    </div>
                </div> -->
            </div>

            <div>
                <div class="bg-white p-4 rounded-4 shadow m-5">
                    fgg
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/adminPanel/main.js') }}"></script>
    <script>

    </script>
</body>
</html>