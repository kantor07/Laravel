@extends('layouts.main')
@section('title') Категории новостей @parent @endsection
@section('content')
    
    <h1>Все новости</h1>
    <br><hr>
    @foreach($newsCategoryList as $key=>$newsCategory)
    <br>
        <div>
            <h2><a href="{{ route('news.index', ['id'=>$key]) }}">{{ $newsCategory['title'] }}</a></h2>
        </div><br><hr>
    @endforeach
@endsection 