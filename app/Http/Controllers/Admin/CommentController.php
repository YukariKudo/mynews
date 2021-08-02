<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\News;
use Carbon\Carbon;
use \Auth;

class CommentController extends Controller
{
    //20210729ニュースモデルからView画面へデータを渡す//
    public function add(Request $request)
    {
      $news = News::find($request->news_id);
      return view('admin.comment.create', ['news_id' => $request->news_id, 'news'=> $news,]);
    }

    public function create(Request $request)
    {
       // Varidationを行う
      $this->validate($request, Comment::$rules);
      
      $comment = new Comment;
      $form = $request->all();
      // データベースに保存する
      $comment->fill($form);
      $comment->user_id= Auth::id();
      $comment->save();
      
      //20210729 更新後のデータ受け渡し時//
      return redirect('admin/comment/create?news_id=' . $request->news_id);
    }

   //以下要確認
   public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Comment::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Comment::all();
      }
      return view('admin.comment.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    //
    
    public function edit()
    {
        return view('admin.comment.edit');
    }

    public function update()
    {
        return redirect('admin/comment/edit');
    }
}
