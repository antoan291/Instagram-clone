<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store()
    {
        $data = request()->validate([
            'text' => 'required',
            'post_id' => '',

        ]);
    
        auth()->user()->comments()->create([
            'text' => $data['text'],
            'post_id' => $data['post_id'],
        ]);

        return redirect('/p/'.$data['post_id']);
    
    }

}
