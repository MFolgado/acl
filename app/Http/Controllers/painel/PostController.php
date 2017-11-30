<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Session\Flash;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }


    public function index(){
        $posts = $this->post->all();

        if(Gate::denies('view_post')){
            abort(403,'Não possui permissão!');
        }

        return view('painel.posts.index', compact('posts'));
    }
}
