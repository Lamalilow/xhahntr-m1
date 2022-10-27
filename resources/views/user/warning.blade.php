@extends('welcome')
@section('title', 'Тебе сюда нельзя')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6 d-flex  flex-column justify-content-center align-content-center">
                <img class="justify-content-center " style="width: 600px" src="{{$random}}" alt="картинка сюда нельзя">
                <a class="d-block m-auto" href="{{route('auth')}}"><button type="button" class="mt-3 btn btn-primary btn-lg ">Авторизоваться</button></a>

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
