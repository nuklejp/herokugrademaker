@extends('layouts.admin')
@section('title', '成績処理の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>成績処理の編集</h2>
                <form action="{{ action('Admin\GradeController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">生徒氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $grade_form->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="test">テスト</label>
                        <div class="col-md-10">
                          <select class="" name="test">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="homework">提出物</label>
                        <div class="col-md-10">
                          <select class="" name="homework">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="expression">表現力</label>
                        <div class="col-md-10">
                          <select class="" name="expression">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="pronunciation">発音</label>
                        <div class="col-md-10">
                          <select class="" name="pronunciation">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="writing">ライティング</label>
                        <div class="col-md-10">
                          <select class="" name="writing">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $grade_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
