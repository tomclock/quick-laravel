<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CtrlController extends Controller
{
    public function plain()
    {
        return response('こんにちは、世界！',200)
            ->header('Content-Type','text/plain');
    }

    public function header()
    {
        return response()
            ->view('ctrl.header',['msg'=>'こんにちは、世界！'],200)
            ->withHeaders([
                'Content-Type','text/xml',
                'X-Powered-FW'=>'Laravel/6']);
    }

    public function outJson()
    {
        return response()
            ->json([
                'name'=>'Yoshihiro, YAMADA',
                'sex'=>'male',
                'age'=>18
            ]);
    }

    public function outFile()
    {
        return response()
            ->download('C:/Data/data_log.csv','download.csv',
            ['content-type'=>'text/csv']);
    }

    public function outCsv()
    {
        return response()
            ->streamDownload(function(){
                print(
                    "1,2019/10/1,123\n".
                    "2,2019/10/1,116\n".
                    "3,2019/10/1,98\n".
                    "4,2019/10/1,102\n".
                    "5,2019/10/1,134\n"
                );
            },'download.csv',['content-type'=>'text/csv']
        );
    }

    public function outImage()
    {
        return response()
            ->file('C:/Data/wings.png',['content-type'=>'image/png']);
    }

    public function redirectBasic()
    {
        return redirect('hello/list');

        // return redirect()->route('list');
    }

    public function param1()
    {
        return redirect()->route('param',['id'=>108]);
    }

    public function param2()
    {
        return redirect()->action([RouteController::class,'param'],['id'=>108]);
    }

    public function toOutSite()
    {
        return redirect()->away('https://wings.msn.to/');
    }

    public function index(Request $req)
    {
        return 'リクエスト:'.$req->path();

    }

    public function hoge(Request $req, $id)
    {
        return 'hoge';
    }

    public function form()
    {
        return view('ctrl.form',['result'=>'']);
    }

    public function result(Request $req)
    {
        //$req->flash();
        $name=$req->name;
        $name=$req->input('name','迷霧系兵営');

        if(empty($name)||mb_strlen($name)>10){
            return redirect('ctrl/form')
            ->withInput()
            ->with('alert', '名前は必須、または１０文字以内で入力してください。');
        }
        else {
            $req->flash();
            return view('ctrl.form',
            [
                'result'=>'こんにちは、'.$name.'さん'
            ]);
        }
    }

    public function upload()
    {
        return view('ctrl.upload',['result'=>'']);
    }

    public function uploadfile(Request $req)
    {
        if(!$req->hasFile('upfile'))
        {
            return 'ファイルをしてください。';
        }

        $file=$req->upfile;

        if(!$file->isValid())
        {
            return 'アップロードに失敗しました。';
        }

        $name=$file->getClientOriginalName();

        $file->storeAs('files', $name);

        return view('ctrl.upload', [
            'result' => $name.'をアップロードしました。'
        ]);
    }

    public function middle()
    {
        return 'log is recorded';
    }

    public function __construct()
    {
        $this->middleware(function($request, $next){

            //TODO AS THIS CONTROLLER NEED.
            return $next($request);
        })->only(['middle','upload']);
    }
}