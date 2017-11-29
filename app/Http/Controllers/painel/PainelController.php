<?php

namespace App\Http\Controllers\Painel;

use App\Permission;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{

    public function index(){

        $users = User::count();
        $roles = Role::count();
        $permissions = Permission::count();
        $posts = Post::count();


        return view('painel.home.index', compact('users', 'roles', 'permissions', 'posts'));


    }

}
