@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="#" class="btn btn-secondary btn-block">カテゴリを管理する</a>
        </div>
        
        <div class="col-md-12">            
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <span>絞り込み</span>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="categorySelect">カテゴリ</label>
                                    <select class="form-control" id="categorySelect">
                                        <option>すべて</option>
                                        <option>プログラミング</option>
                                        <option>筋トレ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="statusSelect">状態</label>
                                    <select class="form-control" id="statusSelect">
                                        <option>すべて</option>
                                        <option>未着手</option>
                                        <option>着手中</option>
                                        <option>未完了</option>
                                        <option>完了</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <span>ToDo一覧</span>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <a href="#" class="btn btn-primary btn-sm">ToDo 追加</a>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">タイトル</th>
                                    <th scope="col">カテゴリ</th>
                                    <th scope="col">状態</th>
                                    <th scope="col">期限</th>
                                    <th scope="col">編集</th>
                                    <th scope="col">削除</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#">Todo機能作成</a></td>
                                        <td>プログラミング</td>
                                        <td>着手中</td>
                                        <td>2021/1/31</td>
                                        <td>
                                            <button class="btn btn-success btn-sm">編集</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm">削除</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">胸トレ</a></td>
                                        <td>筋トレ</td>
                                        <td>未着手</td>
                                        <td>2021/2/1</td>
                                        <td>
                                            <button class="btn btn-success btn-sm">編集</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm">削除</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection