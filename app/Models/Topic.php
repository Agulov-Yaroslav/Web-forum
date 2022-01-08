<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Topic extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'body', 'user_id' ];
    public function user(){
        return $this -> hasOne(User::class, 'id', 'user_id');
    }
}
