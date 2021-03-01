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
        @method('PATCH')
        <div class="p1-2">
            <label id='isbn'>ISBNコード:</label><br/>
            <input id='isbn' name='isbn' type="text"
                size="15" value="{{old('isbn',$b->isbn)}}"
            />
        </div>

        <div class="p1-2">
            <label id='title'>書名:</label><br/>
            <input id='title' name='title' type="text"
                size="30" value="{{old('title',$b->title)}}"
            />
        </div>

        <div class="p1-2">
            <label id='price'>価格:</label><br/>
            <input id='price' name='price' type="text"
                size="5" value="{{old('price',$b->price)}}"
            />
        </div>

        <div class="p1-2">
            <label id='publisher'>出版社:</label><br/>
            <input id='publisher' name='publisher' type="text"
                size="10" value="{{old('publisher',$b->publisher)}}"
            />
        </div>

        <div class="p1-2">
            <label id='published'>刊行日:</label><br/>
            <input id='published' name='published' type="text"
                size="10" value="{{old('published',$b->published)}}"
            />
        </div>

        <div class="p1-2">
            <input type="submit" value="更新"
            />
        </div>
    </form>
@endsection