<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   protected $guarded = array('id');

    public static $rules = array(
        'body' => 'required',
    );
    //
    public function histories()
    {
      return $this->hasMany('App\History');

    }
    
    public function comments()//20210728コメント履歴残す際には必須
    {
      return $this->hasMany('App\Comment');

    }

}
