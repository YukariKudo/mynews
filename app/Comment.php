<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //20210728idを付ける際は必須//
    protected $guarded = array('id');
    
     public static $rules = array(
        'news_id' => 'required',
        'body' => 'required',
    );
    public function user()//belongsToの時は単数形(×users)//20210730UserモデルとCommentモデルを繋ぐ//
    {
      return $this->belongsTo('App\User');
    }
}
