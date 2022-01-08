<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'body', 'user_id', 'topic_id', ];
    public function topic(){
        return $this -> hasOne(Topic::class, 'id', 'topic_id');
    }
    public function user(){
        return $this -> hasOne(Topic::class, 'id', 'topic_id');
    }

}
