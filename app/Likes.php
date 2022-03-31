<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = ['user_id', 'posts_id', 'num_likes'];
    public $timestamps = false;
    
    // Postsテーブルに対するリレーション
    
    //「1対1」の関係なので単数系に
    public function post()
    {
        return $this->belongsTo('App\PostModel');
    }
    
    // Usersテーブルに対するリレーション
    
    //「1対多」の関係なので単数系に
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
