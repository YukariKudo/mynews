@extends('layouts.front')

@section('content')
  <div class="header-title-area col-md-8 mx-auto">
    <h1 class="logo">The news for practicing Programming</h1>
      <p class="text-sub">不定期で情報提供します。</p>
  </div>
    <div class="container">
        @if (!is_null($headline))
            <div class="row">
              <div style=" border:1px solid #000">
                <div class="headline col-md-8 mx-auto">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ $headline->image_path }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                      </div>  
                        <div class="col-md-8">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                    <a href="{{ 'admin/comment/create?news_id=' . $headline->id }}">コメントを書く</a>{{--20210801トップページにコメントを書くのリンク--}}
                </div> 
            </div>
        @endif
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                          <div style=" border:1px solid #000">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ $post->image_path }}">
                                @endif
                            </div>
                            {{-- 20210729コメント入力へのリンク書き方　＄はforeachで定義されているもの//--}}
                        　　<a href="{{ 'admin/comment/create?news_id=' . $post->id }}">コメントを書く</a>
                        　</div>
                        </div>
                    </div>
                    
                @endforeach
          </div>
        </div>
@endsection