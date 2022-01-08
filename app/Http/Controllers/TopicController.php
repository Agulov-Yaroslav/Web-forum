<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;


class TopicController extends Controller
{
    public function list(){
        $topics = Topic::with('user')->get();

        return view('topic', ['topics'=>$topics]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->only('name', 'body'), [
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'body' => ['required', 'string', 'max:500'],
        ])->validate();
        //Нужно будет провалидировать приходящие названия тем на их индивидуальность
        $data = $request->only('name', 'body', 'user_id');

            $form = Topic::create([
                "name" => $data["name"],
                "body" => $data["body"],
                "user_id" => Auth::user()->id,
            ]);

        if($form){
            return redirect()->route('topic');
        }

    }
    public function one($id){
        $posts = Post::with('topic')->where('topic_id', '=', $id)->get();
        //$user = User::select('id')->get();
        $topic = Topic::find($id);


        return view('one', ['topic'=>$topic, 'posts'=>$posts]);
    }
    public function comment(Request $request, $id){
        $validator = Validator::make($request->only('name', 'body'), [
            'name' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:2000'],
        ])->validate();
        $data = $request->only('name', 'body', 'user_id');


        $form = Post::create([
            "name" => $data["name"],
            "body" => $data["body"],
            "user_id" => Auth::user()->id,
            "topic_id" => Topic::find($id)->id,
        ]);

        if($form){
            return redirect()->back();
        }

    }
}
