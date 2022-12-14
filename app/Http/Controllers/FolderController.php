<?php

namespace App\Http\Controllers;

// クラスのインポート
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;


class FolderController extends Controller
{

    public function showCreateForm()
    {
        return view('folders/create');
    }

    // 引数にインポートしたRequestクラスを受け入れる
    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;
        // インスタンスの状態をデータベースに書き込む
        $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
