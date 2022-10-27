@extends('welcome')
@section('title', 'Удаление')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2>Удаление заявки</h2>
                <p>Название заявки {{ $order -> news }}</p>
                <p>Описание заявки {{ $order -> description }}</p>
                <p>Категория заявки {{ $order -> category() }}</p>
                <p class="text text-danger">Вы точно хотите удалить заявку?</p>
                <form method="POST">
                    @csrf
                    
                    <a href="{{ route('acc') }}">Отмена операции</a>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
