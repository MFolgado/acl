@extends('layouts.app')

@section('content')
<div class="container">

    @forelse($posts as $post)
        @can('view_post', $post)
            <h1>{{ $post->title }}</h1>
            <p> {{ $post->description }}</p>
            <strong>Author: {{ $post->user->name }}</strong>
            <a href="{{url("/post/$post->id/update")}}">Editar</a>
            <hr/>
        @endcan
    @empty
        <strong> Post não cadastrado</strong>
    @endforelse
</div>
@endsection
