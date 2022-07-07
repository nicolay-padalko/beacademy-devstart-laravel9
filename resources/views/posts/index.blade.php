@extends('template.users')
@section('title', 'Listagem de Postagens')
@section('body')

    <h1>Listagem de Postagens</h1>

    <table class="table">
        <thead class="text-center">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Usuário</th>
            <th scope="col">Titulo</th>
            <th scope="col">Postagem</th>
            <th scope="col">data Cadastro</th>
        </tr>
        <tbody class="text-center">
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ date('d/m/y - H:i', strtotime($post->created_at)) }}</td>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
    <div class="justify-content-center pagination">
{{--        {{ $posts->links('pagination::bootstrap-4') }}--}}
    </div>
@endsection
