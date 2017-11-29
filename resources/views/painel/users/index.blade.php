@extends('painel.templates.template')

@section('content')

    <!--Filters and actions-->
    <div class="actions">
        <div class="container">
            <a class="add" href="forms">
                <i class="fa fa-plus-circle"></i>
            </a>

            <form class="form-search form form-inline">
                <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
                <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
            </form>
        </div>
    </div><!--Actions-->
    <div class="container">
        <h1 class="title">
            Listagem dos Users
        </h1>

        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th width="150px">Ações</th>
            </tr>
            @can('root')
            @forelse($users as $user)
                <tr>
                    <td> {{$user->name}}</td>
                    <td> {{$user->email}}</td>
                    <td>
                        <a href="{{url("/painel/user/$user->id/roles")}}" class="permission">
                            <i class="fa fa-lock"></i>
                        </a>
                        <a href="{{url("/painel/post/$user->id/edit")}}" class="edit">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href="{{url("/painel/post/$user->id/delete")}}" class="delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr> <td colspan="90"> <p> Nenhum resultado </p> </td></tr>
            @endforelse
            @else
                <tr>
                    <td> {{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                    <td> {{\Illuminate\Support\Facades\Auth::user()->email}}</td>
                    <td>
                        <a href="{{url("/painel/user/Auth::user()->id/roles")}}" class="permission">
                            <i class="fa fa-lock"></i>
                        </a>
                        <a href="{{url("/painel/post/Auth::user()->id/edit")}}" class="edit">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                    </td>
                </tr>
            @endcan
        </table>
    </div>
@endsection