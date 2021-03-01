<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use DB;

//a.Controller クラスを継承
class HelloController extends Controller
{
    //b.アクションメソッドを定義
    public function index()
    {
        //c.出力を戻り値
        return 'こんにちは！';
    }

    public function view()
    {
        $data=[
            'msg'=>'こんにちは、世界！'
        ];

        return view('hello.view',$data);
    }

    public function view2()
    {
        $data=[
            'msg'=>'こんにちは、世界！'
        ];

        return view('hello.view2',$data);
    }

    public function list()
    {
        //'records' => Book::all()
        $data=[
            'records' => Book::all()
        ];
        return view('hello.list',$data);
    }
}
