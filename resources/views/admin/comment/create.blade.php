@extends('layouts.comment')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title','コメントの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント新規作成</h2>
                <form action="{{ action('Admin\CommentController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <input type="hidden" name="news_id" value="{{ $news_id }}" >
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="入力">
                </form>
                 {{-- //20210729以下コメント履歴記載方法// --}}
                 <div class="row mt-5">
                    <div class="col-md-10 mx-auto">{{--20210801bootstrap10マス使用--}}
                        <h2>コメント履歴</h2>
                        <div class="list-group">
                            @if ($news->comments != NULL){{--20210730オレンジはテーブルやfunctionでつけたクラス名--}}
                              <table class="table table-dark"> {{--20210801横並びはtable,foreachの外--}}
                                  <tr>{{--20210801タイトルを付けるとき--}}
                                    <th>日付</th>
                                    <th>記入者</th>
                                    <th>内容</th>
                                  </tr>
                                <tbody>
                                @foreach ($news->comments as $comment)
                                  <tr>
                                    <td>{{ str_limit($comment->created_at, 20)}}</td>
                                    <td>{{ str_limit($comment->user->name ,10)}}</td>
                                    <td>{{ str_limit($comment->body,30)}}</td>{{--20210801表示したい文字数を表記 --}}
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection