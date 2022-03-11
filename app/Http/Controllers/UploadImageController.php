<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    ////$request->inputのname属性でつけた名前でデータがとれる。(この場合imgpath)

    public function store(Request $request){
        //$img=$request->imgpath;  //formで設置したname名
        //$img=$request->file(imgpath); fileメソッドを使うとファイル？だけが取れるそうだが変わらなかったので使っても使わなくてもどっちでも良いと思う。
         
        $img = $request->imgpath->store('image');  //storeメソッドを追加
        // dd($img);
        return redirect('/');
    }
}
