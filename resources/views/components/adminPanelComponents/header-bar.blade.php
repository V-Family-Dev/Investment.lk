<div class="header-bar w-100 bg-white shadow-sm d-flex align-items-center px-3 justify-content-between">
    <div class="text-secondary fs-6">
        {{$path}}
    </div>
    <div>
        <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img width="40" height="40" src="{{ asset('images/person/zak.png') }}" alt=""
                class="rounded-circle object-fit-cover">
            <i class="fa-solid fa-caret-down ps-2 text-secondary"></i>
            <div class="dropdown">
                <ul class="dropdown-menu mt-3">
                    <li class="">
                        <a class="dropdown-item d-flex py-3" href="#">
                            <img width="60" height="60" src="{{ asset('images/person/zak.png') }}" alt=""
                                class=" rounded-circle object-fit-cover ">
                            <div class="ps-3">
                                <div>{{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}</div>
                                <div class="text-secondary">
                                {{ Auth::user()->email }}
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex justify-content-between align-items-center py-2" href="#">
                            <!-- <div>Logout</div> 
                                        <i class="fa-solid fa-right-from-bracket"></i> -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>