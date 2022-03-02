<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    // 下記のようにすることで明示的にPostsテーブルの内容をこのモデルで取得するように設定
    // ※下記を指定しないとデフォルトでpostmodelというテーブルが指定されてしまう
    protected $table = 'posts';
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        // return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
        return $this->orderBy('updated_at', 'DESC')->take($limit_count)->get();
    }
    
    // bodyレコード、user_id、likes_idのLaravel上でのfillを可能にする
    protected $fillable = [
        'body',
        'user_id',
        'likes_id',
    ];
    
    // Userテーブルに対するリレーション

    //「1対多」の関係なので単数系に
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    // Likesテーブルに対するリレーション
    
    //「1対1」の関係なので単数系に
    public function like()
    {
        return $this->belongsTo('App\Likes');
    }
}