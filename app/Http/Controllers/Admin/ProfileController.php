<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request){
    $this->validate($request, Profile::$rules);
      $profiles = new Profile;
      $form = $request->all();
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $profiles->image_path = basename($path);
      } else {
          $news->image_path = null;
      }
      
      unset($form['_token']);
      unset($form['image']);
      $profile->fill($form);
      $profile->save();
       
       return redirect('admin/profile/create');}
       
       public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
   
    public function edit(){
        return view('admin.profile.edit');
    }
    public function update(){
        return redirect('admin/profile/edit');
    }
}
