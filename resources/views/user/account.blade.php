@extends('welcome')
@section('title','Аккаунт')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-22"><h2>Личный кабинет</h2>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Временная метка</th>
                        <th scope="col">Название заявки</th>
                        <th scope="col">Описание заявки</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Фото новое</th>
                        <th scope="col">Удаление заявки</th>
                        <th scope="col">Изменение заявки</th>
                    </tr>
                    </thead>
                    @foreach($orders as $order)
                        <tbody>
                        <tr>
                            <td>{{$order -> id}}</td>
                            <td>{{$order -> created_at}}</td>
                            <td>{{$order -> news}}</td>
                            <td>{{$order -> description}}</td>
                            <td>{{$order -> category()}}</td>
                            <td>{{$order -> status()}}</td>
                            <td>
                                <img style="max-width: 300px; max-height: 150px" src="{{asset('storage/app/public/'.$order -> photo)}}" alt="Картинка">
                            </td>
                            <td>
                                <img style="max-width: 300px; max-height: 150px" src="{{asset('storage/app/public/'.$order -> photo_new)}}" alt="Картинка новая">
                            </td>
                            <td><a href="{{route('delete', $order -> id)}}">Удалить заявку</a></td>
                            <td><a href="{{route('update', $order -> id)}}">Изменить заявку</a></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>


@endsection
