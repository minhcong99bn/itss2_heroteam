<div class="top">
    <nav class="navbar" style="background-color: #823B40;">
        <div class="nav-logo">
            <img src="{{ asset('storage/images/logo.png') }}" alt="logo" />
        </div>
        <div class="mt--1" style="margin-top: -3%;">
            <ul class="nav-menu" style="margin-bottom: -40px;">
                <li>
                    <a style="color:white; text-decoration: none; font-weight: 500; font-size: 24px;" href="{{ route('dashboard') }}">Collection</a>
                </li>
                <li>
                    <a style="color:white; text-decoration: none; font-weight: 500; font-size: 24px; " href="{{ route('collection.getshare') }}">Get Share</a>
                </li>
            </ul>
        </div>
        <div class="dropdown" style="margin-top: -1%;">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i
                class="far fa-user-circle text-white"
                style="font-size: 45px; cursor: pointer"
                ></i>
            </a>
            <ul class="dropdown-menu">
                <li class="mb-2" style="border-bottom: 0.5px solid #C4C4C4;">
                    <div style="" class="py-2 px-3">
                        <span style="color:black; ">{{ auth()->user()->name }}</span>
                    </div>
                </li>
                <li class="py-2 px-3">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"  style="color:black; " onclick="event.preventDefault();
                        this.closest('form').submit();" >
                </form>
                    Log Out
                </a></li>
            </ul>
        </div>
    </nav>
</div>
