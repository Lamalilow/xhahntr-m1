@extends('welcome')
@section('title','Панель админа')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-22">
                <h2>Личный кабинет</h2>
                <h3>Новых заявок {{$count}}</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Временная метка</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Фото новое</th>
                        <th scope="col">Удаление</th>
                        <th scope="col">Изменение</th>
                        @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                          <th scope="col">Статус</th>
                        @endif
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
                            <td>
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        <select name="status_id" class="form-select" onchange="this.form.submit()" >
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}" @if($order->status() == $status->name) selected @endif>{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                @endif
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
