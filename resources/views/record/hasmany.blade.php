@extends('layouts.base')
@section('title','フォーム基本')
@section('main')
<h3>[{{$book->title}}]のレビュー</h3>
<ul>
    @foreach($book->reviews as $rev)
        <li>
            {{$rev->body}}({{$rev->name}})
        </li>
    @endforeach
</ul>
@endsection