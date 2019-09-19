@extends('layouts.admin')
@section('title', '成績表処理一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>成績表処理一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\GradeController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\GradeController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">生徒氏名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value={{ $cond_name }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-grade col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">生徒氏名</th>
                                <th width="10%">テスト</th>
                                <th width="10%">提出物</th>
                                <th width="10%">表現力</th>
                                <th width="10%">発音</th>
                                <th width="10%">ライティング</th>
                                <th width="10%">評価</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $grade)
                                <tr>
                                    <th>{{ $grade->id }}</th>
                                    <td>{{ str_limit($grade->name, 100) }}</td>
                                    <td>{{ str_limit($grade->test, 100) }}</td>
                                    <td>{{ str_limit($grade->homework, 100) }}</td>
                                    <td>{{ str_limit($grade->expression, 100) }}</td>
                                    <td>{{ str_limit($grade->pronunciation, 100) }}</td>
                                    <td>{{ str_limit($grade->writing, 100) }}</td>
                                    <td>{{ str_limit($grade->finalgrade, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\GradeController@edit', ['id' => $grade->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\GradeController@delete', ['id' => $grade->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
