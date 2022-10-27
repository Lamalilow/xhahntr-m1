@extends('welcome')
@section('title','Авторизация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form method="POST">
                    @csrf
                    @error('errorLogin') <p class="alert alert-danger">{{ $message }} </p>@enderror
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label @error('login') is-invalid @enderror()">Логин</label>
                        <input type="text" name="login" class="form-control" id="inputLogin" aria-describedby="emailHelp">
                        @error('login')
                        <div id="invalidLogin" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label @error('password') is-invalid @enderror()">Пароль</label>
                        <input type="password" name="password" class="form-control" id="inputPassword">
                        @error('password')
                        <div id="invalidLogin" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-sm-center">
                        <button type="submit" class="btn btn-primary me-3">Авторизоваться</button>
                        <a href="{{route('reg')}}" class="ms-3">Регистрация</a>
                    </div>

                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
