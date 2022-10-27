@extends('welcome')
@section('title', 'Главная')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12">
                <h2>Главная</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Название заявки</th>
                        <th scope="col">Описание заявки</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Фото</th>
                    </tr>
                    </thead>
                    @foreach($orders as $order)
                        <tbody>
                        <tr>
                            <td>{{$order -> news}}</td>
                            <td>{{$order -> description}}</td>
                            <td>{{$order -> category()}}</td>
                            <td>
                                <img style="max-width: 300px; max-height: 150px" src="{{asset('storage/app/public/'.$order -> photo)}}" alt="Картинка">
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
