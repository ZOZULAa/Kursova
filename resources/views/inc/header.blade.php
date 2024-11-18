<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container-fluid">
        <!-- Назва сайту -->
        <a class="navbar-brand" href="{{ route('medicineList.index') }}">Твоє здоров'я</a>

        <!-- Кнопка для мобільного меню -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Основне меню -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('medicineList.index') }}">Medicine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                @if((auth()->user()->role ?? '') == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/medicine">CRUD</a>
                    </li>
                @endif
            </ul>

            <!-- Меню для аутентифікованих користувачів -->
            @auth
            <ul class="navbar-nav me-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">Кошик</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.index') }}">Замовлення</a>
                </li>
            </ul>
            @endauth

            <!-- Меню профілю -->
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownProfileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                    @guest
                        Profile
                    @endguest
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfileMenu">
                    @auth
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
