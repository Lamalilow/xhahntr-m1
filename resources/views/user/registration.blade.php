@extends('welcome')
@section('title','Регистрация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Логин</label>
                        <input type="text" name="login" class="form-control @error('login') is-invalid @enderror()" id="inputLogin" >
                        @error('login') <p id="errorLogin" class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Имя</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror()" id="inputName">
                        @error('name') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror()" id="inputPassword">
                        @error('password') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPasswordConfirm" class="form-label">Повторите пароль</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror()" name="password_confirmation" id="inputPasswordConfirm">
                        @error('password_confirmation') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('success') is-invalid @enderror()" name="success" type="checkbox" id="Success">
                        <label class="form-check-label" for="Success">Согласен на обработку данных</label>
                        @error('success') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="d-flex align-items-sm-center">
                        <button type="submit" class="btn btn-primary me-3">Регистрация</button>
                        <a href="{{route('auth')}}" class="ms-3">Авторизоваться</a>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>

@endsection
