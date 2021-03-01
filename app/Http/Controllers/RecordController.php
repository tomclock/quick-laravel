<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use DB;

//a.Controller クラスを継承
class RecordController extends Controller
{
    public function find()
    {
        return Book::find(1)->title;
    }

    public function where()
    {
        //$result=Book::where('publisher','翔泳社')->get();
        //$result=Book::where('price','<',300)->get();
        //$result=Book::where('title','LIKE','%Java%')->get();
        //$result=Book::whereIn('publisher',['翔泳社','日経BP','インプレス'])->get();
        //$result=Book::whereBetween('price',[1000,3000]])->get();
        //whereNotIn/whereNotBetween/whereNull/whereYear('published','2019')
        //whereMonth, whereDay,whereTime;whereYear('published','<','2019')
        //$result=Book::whereRaw('publisher =? AND price<?',['翔泳社',3000] )->first();
        //$result=Book::where('publisher','翔泳社')->first();
        //return view('hello.list',['records'=>$result]);


        //$result=Book::select('title','publisher')->orderBy('price','desc')->orderBy('published','asc')
        //            ->offset(2)->limit(3)->get();


        $result=Book::groupBy('publisher')
            ->having('price_avg','<', 2500)
            ->selectRaw('publisher, AVG(price) as price_avg')->get();
        
        return view('record.where',['records'=>$result]);
    }

    public function hasmany()
    {
        return view('record.hasmany',[
            'book'=>Book::find(1)
        ]);
    }
}