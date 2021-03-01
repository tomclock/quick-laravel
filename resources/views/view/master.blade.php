<!-- layouts/base.blade.phpを継承する -->
@extends('layouts.base')

<!-- layouts/base.blade.phpを置き換える -->
@section('title', '共通レイアウトの基本')

<!-- layouts/base.blade.php のmain section の内容を継承する。 -->
@section('main')
    <!-- layouts/base.blade.php のmain-->
    @parent
    <!-- 新規の内容-->
    <p>
        {{$msg}}
    </p>
@endsection