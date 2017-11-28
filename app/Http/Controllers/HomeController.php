<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

//        $posts = Post::where('user_id', '=', Auth::user()->id)->get();

        return view('home', compact('posts'));
    }

    public function update($idPost){

        $post = Post::find($idPost);

       if(Gate::denies('update-post', $post))
           abort(403, 'Não autorizado!');

        return view('post-update', compact('post'));
    }

    public function rolesPermissions(){

        $nameUser = auth()->user()->name;

        var_dump("<h1>  $nameUser  </h1>");

        foreach(auth()->user()->roles as $role){

            echo "$role->name ->";
            $permissions = $role->permissions;
           foreach($permissions as $permission){
               echo "$permission->name , ";
           }

        }

//        return 'Roles and permissions user';
    }
}
