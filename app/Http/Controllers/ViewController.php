<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use DB;

//a.Controller クラスを継承
class ViewController extends Controller
{
    public function escape()
    {
        return view('view.escape',
        ['msg' => '<img src = "https://wings.msn.to/image/wings.jpg" title="ログ"/>
                   <p>WINGSへようこそ</p>'
    ]);
    }

    public function if()
    {
        return view('view.if',[
            'random' => random_int(0,100)
        ]);
    }

    public function foreach_assoc()
    {
        return view('view.foreach_assoc',[
            'member' =>[
                'name' => 'YAMADA, Yoshihiro',
                'sex' => 'Male',
                'birth' => '1923-11-10'
            ]
        ]);
    }

    public function foreach_loop()
    {
        return view('view.foreach_loop', [
            'weeks' => [
                '月曜日','火曜日','水曜日','木曜日','金曜日','土曜日','日曜日'
            ]
        ]);
    }

    public function master()
    {
        return view('view.master', [
            'msg'=>'こんにちは、世界！マスター'
        ]);
    }

    public function comp()
    {
        return view('view.comp', [
            'msg'=>'こんにちは、世界！Comp'
        ]);
    }

    public function list()
    {
        //'records' => Book::all()
        //'records' => DB::select('SELECT * FROM books')
        $data=[
            'records' => Book::all()
        ];

        return view('view.list',$data);
    }
}
