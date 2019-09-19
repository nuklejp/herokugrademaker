<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Grade;

class GradeController extends Controller
{
    //
    public function add()
    {
        return view('admin.grade.create');
    }

    public function create(Request $request)
    {
          // 以下を追記
        // Varidationを行う
        $this->validate($request, Grade::$rules);
        $newGrade = new Grade;
        $form = $newGrade->judgeGrade($request->all());
        $newGrade->fill($form);
        $newGrade->save();




        return redirect('admin/grade/');
    }

    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            // 検索されたら検索結果を取得する
            $posts = Grade::where('name', $cond_name)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Grade::all();
        }
        return view('admin.grade.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }

    public function edit(Request $request)
    {
        // grade Modelからデータを取得する
        $grade = Grade::find($request->id);
        if (empty($grade)) {
          abort(404);
        }

        return view('admin.grade.edit', ['grade_form' => $grade]);
    }


  public function update(Request $request)
  {
    // Validationをかける
    $this->validate($request, grade::$rules);
    // grade Modelからデータを取得する
    $grade = Grade::find($request->id);

    //$grade_form = $request->all();
    // 該当するデータを上書きして保存する

    $grade_form = $grade->judgeGrade($request->all());
    $grade->fill($grade_form)->save();

    return redirect('admin/grade');

  }

  public function delete(Request $request)
  {
      // 該当するgrade Modelを取得
      $grade = Grade::find($request->id);
      // 削除する
      $grade->delete();
      return redirect('admin/grade/');
  }
}
