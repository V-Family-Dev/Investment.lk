<div class="sidebar shadow-sm bg-white z-1">
            <div class="p-4 fs-4 fw-bold">
            Investment Lanka
            </div>
            @auth
            @if(Auth::user()->usertype == "admin")
            <a href="/admin/dashboard">Dashboard</a>
            <a href="/admin/profile">Profile</a>
            <div class="accordion" >
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        User Management
                    </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
<<<<<<< HEAD
                       <a href="">User add</a>
                       <a href="{{route('adminPanel.admin.userList')}}">User list</a>
=======
                       <a href="/admin/userList">User list</a>
>>>>>>> 899b7b7d8d5313a5e66485c3d70ac76b97caa6c3
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                        Property Management
                    </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <a href="/admin/propertyAdd">Property add</a>
                        <a href="{{ route('adminPanel.admin.propertyList') }}">Property list</a>
                        </div>
                    </div>
                </div>


                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                        User Payment Management
                    </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <a href="">User Payment list</a>
                    </div>
                    </div>
                </div>
            @elseif(Auth::user()->usertype == "seller")
                <a href="/admin/dashboard">Dashboard</a>
                <a href="/admin/profile">Profile</a>
                <div class="accordion" >
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                            Property Management
                        </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="/admin/propertyAdd">Property add</a>
<<<<<<< HEAD
                            <a href="{{route('adminPanel.admin.propertyListSeller')}}">Property list</a>
=======
                            <a href="/seller/propertyList">Property list</a>
>>>>>>> 899b7b7d8d5313a5e66485c3d70ac76b97caa6c3
                        </div>
                        </div>
                    </div>
            @endif
            @endauth
            </div>
        </div>
