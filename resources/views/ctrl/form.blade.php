@extends('layouts.base')
@section('title','フォーム基本')
@section('main')
    @if(session('alert'))
    <div class="alert">
        {{session('alert')}}
    </div>
    @endif

    <form method="POST" action="/ctrl/result">
        @csrf
        <label id="name">名前：</label>
        <input id="name" name="name" type="text" 
            value="{{ old('name', '') }}" />
        <input type="submit" value="送信" />
        <p>
            {{$result}}
        </p>

    </form>
@endsection