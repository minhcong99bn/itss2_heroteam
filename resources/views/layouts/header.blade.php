<div class="top">
    <nav class="navbar">
        <div class="nav-logo">
            <img src="{{ asset('storage/images/logo.png') }}" alt="logo" />
        </div>
        <div>
            <ul class="nav-menu">
                <li>
                    <a style="color:white; text-decoration: none;" href="{{ route('dashboard') }}">Collection</a>
                </li>
                <li>
                    <a style="color:white; text-decoration: none;" href="{{ route('card.index') }}">Review</a>
                </li>
                <li>
                    <a style="color:white; text-decoration: none;" href="{{ route('collection.getshare') }}">Get Share</a>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
                <i
                class="far fa-user-circle text-white"
                style="font-size: 50px; cursor: pointer"
                ></i>
            </a>
            <ul class="dropdown-menu">
                <li class="mb-3"><span style="color:black; font-weight:800;">{{ auth()->user()->name }}</span></li>
                <li><form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"  style="color:black; font-weight:800;" onclick="event.preventDefault();
                        this.closest('form').submit();" >
                </form>
                    Log Out
                </a></li>
            </ul>
        </div>
    </nav>
</div>
