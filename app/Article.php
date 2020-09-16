<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{

    protected $fillable = [
        'title', 'body', 'img', 'user_id', 'category_id'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');

    }

    public function user()
    {
        return $this->beLongsTo('App\User');

    }

    public function getCat($id)
    {
        return DB::table('categories')->where('id', $id)->first();
    }

}
