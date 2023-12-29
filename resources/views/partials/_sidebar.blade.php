<div class="menuToggle"></div>
<div class="sidebar">
    <ul>
        <li class="logo" style="--bg:#333;">
            <a href="{{ route('welcome') }}">
                <div class="icon"><img src="{{ asset('asset/Images/UY1.png') }}"></div>
                <div class="text">UY1</div>
            </a>
        </li>
        <div class="Menulist">
            <li style="--bg:#f44336;" class="{{ request()->routeIs('delegue') ? 'active' : '' }}">
                <a href="{{ route('delegue') }}">
                    <div class="icon"><i class="fa-solid fa-house"></i></div>
                    <div class="text">Home</div>
                </a>
            </li>
            <li style="--bg:#2196f3;" class="{{ request()->routeIs('analytics') ? 'active' : '' }}">
                <a href="{{ route('analytics') }}">
                    <div class="icon"><i class="fa-solid fa-chart-bar"></i></div>
                    <div class="text">Tableau Fiches</div>
                </a>
            </li>
            <li style="--bg:#b145e9;" class="{{ request()->routeIs('order') ? 'active' : '' }}">
                <a href="{{ route('order') }}">
                    <div class="icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="text">Corbeille</div>
                </a>
            </li>
            <li style="--bg:#e91e63;" class="{{ request()->routeIs('settings') ? 'active' : '' }}">
                <a href="{{ route('settings') }}">
                    <div class="icon"><i class="fa-solid fa-gear"></i></div>
                    <div class="text">Paramètres</div>
                </a>
            </li>
        </div>

        <div class="bottom">
            <li class="logo" style="--bg:#333;">
                <a href="#">
                    <div class="icon">
                        <div class="imgBx">
                            <img src="{{ asset('asset/Images/del.png') }}">
                        </div>
                    </div>
                    <div class="text">Kamela Pierrick Dack</div>
                </a>
            </li>
            <li style="--bg:#333;">
                <a href="#" onclick="openModal()">
                    <div class="icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <div class="text">Logout</div>
                </a>
            </li>
        </div>
    </ul>
</div>
