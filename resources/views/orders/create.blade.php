@extends('welcome')
@section('title', 'Добавление')
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
                        <input type="text" name="news" class="form-control" id="exampleFormControlInput1" >
                        @error('news') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('description') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="photo" class="form-control" id="inputGroupFile02">
                        @error('photo') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Категория</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Выберите нужную категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category -> id}}">{{$category -> name}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text text-danger">{{$message}}</p> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
