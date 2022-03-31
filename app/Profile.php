<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile';
    
    protected $fillable = [
        'icon_image', 'bio', 'user_id',
    ];
    
    // Userテーブルに対するリレーション
    
    //1対1の関係
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
