<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('/')}}">Новости РОССИЯ</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth') }}">Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reg') }}">Регистрация</a>
                </li>
                @endguest
                @auth
                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin')}}">Панель администратора</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('add') }}">Добавить</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('acc') }}">Мой аккаунт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Выйти</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
