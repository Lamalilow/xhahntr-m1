@extends('welcome')
@section('title', 'Изменить')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h2>Создание заявки</h2>
                @error('success') <p class="alert alert-danger">{{ $message }}</p>@enderror
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Название</label>
                        <input type="text" value="{{$order->news}}" name="news" class="form-control"  id="exampleFormControlInput1" >
                        @error('news') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
{{--                        <input class="form-control"  value="{{$order->description}}" name="description" id="exampleFormControlTextarea1" rows="3">--}}
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$order->description}}</textarea>
                        @error('description') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Старое фото</label>
                        <img style="max-width: 300px; max-height: 150px" src="{{asset('storage/app/public/'.$order -> photo)}}" alt="Картинка">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="photo_new" class="form-control" id="inputGroupFile02">
                        @error('photo_new') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Категория</label>
                        <select class="form-select"  aria-label="Default select example" name="category_id">

                            @foreach($categories as $category)
                                <option value="{{$category -> id}}">{{$category -> name}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
