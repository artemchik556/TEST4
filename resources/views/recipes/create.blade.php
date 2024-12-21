@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить рецепт</h1>
    <form method="POST" action="{{ route('recipes.store') }}">
        @csrf
        <div>
            <label>Название</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>Текст</label>
            <textarea name="text" required></textarea>
        </div>
        <div>
            <label>Категория</label>
            <select name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Добавить</button>
    </form>
</div>
@endsection