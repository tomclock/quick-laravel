@extends('layouts.base')
@section('title','書籍情報フォーム(編集)')
@section('main')
    @if(session('alert'))
    <div class="alert">
        {{session('alert')}}
    </div>
    @endif

    <form method="POST" action="/save/{{$b->id}}">
        @csrf
        @method('DELETE')
        <div class="p1-2">
            <span id='isbn'>ISBNコード:</span><br/>
            {{$b->isbn}}
            />
        </div>

        <div class="p1-2">
            <span id='title'>書名:</span><br/>
            {{$b->title}}
            />
        </div>

        <div class="p1-2">
            <span id='price'>価格:</span><br/>
            {{$b->price}}
            />
        </div>

        <div class="p1-2">
            <span id='publisher'>出版社:</span><br/>
            {{$b->publisher}}
            />
        </div>

        <div class="p1-2">
            <span id='published'>刊行日:</span><br/>
            {{$b->published}}
            />
        </div>

        <div class="p1-2">
            <input type="submit" value="削除"
            />
        </div>
    </form>
@endsection