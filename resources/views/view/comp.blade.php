@extends('layouts.base')
@section('title','共通レイアウトの基本')

@section('main')
    @component('components.alert',['type'=>'sucess'])
        @slot('alert_title')
        初めてのコンポーネント
        <p>
        How are you 
        </p>
        @endslot

        コンポーネントは普通のビューと同じようにblade.phpファイルで
        定義できます。
    @endcomponent

    <p>
        {{$msg}}
    </p>
@endsection