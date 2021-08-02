@extends('layouts.comment')
@section('title', '登録済みコメントの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>コメント一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\CommentController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $comment)
                                <tr>
                                    <th>{{ $comment->id }}</th>
                                    <td>{{ \Str::limit($comment->title, 100) }}</td>
                                    <td>{{ \Str::limit($comment->body, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection