@extends('template.users')
@section('title', "Listagem de Postagens do {$user->name}")
@section('body')
    <h1>Postagens do {{ $user->name }}</h1>

    @foreach($posts as $post)
        <div class="mb-3">
            <label class="form-label">Idendificação No.<br><b> {{ $post->id }}</b></label>
            <br>
            <label class="form-label">Status<br> {{ $post->active?'Ativo':'Inativo' }}</label>
            <br>
            <label class="form-label">Titulo<br><b> {{ $post->title }}</b></label>
            <br>
            <label class="form-label">Postagem<br></label>
            <br>
            <textarea class="form-control" rows="3">Postagem<br> {{ $post->post }}</textarea>
            <br>

        </div>
    @endforeach
@endsection
