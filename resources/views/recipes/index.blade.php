@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Рецепты</h1>
    @foreach($recipes as $recipe)
        <div>
            <h2>{{ $recipe->title }}</h2>
            <p>Категория: {{ $recipe->category->name }}</p>
            <p>{{ $recipe->text }}</p>
            <p>Добавлено: {{ $recipe->created_at }}</p>
        </div>
        <p>Успешных голодных игр</p>
    @endforeach
</div>
@endsection