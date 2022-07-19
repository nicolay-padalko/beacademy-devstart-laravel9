@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')

    <div class="justify-content-center m-5">
        <div class="card" style="width: 18rem;">
            <img src=" {{ asset('storage/dash.jpg') }} " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Bem vindo ao dashboard</h5>
                <p class="card-text">PayLivre Academia</p>
            </div>
        </div>
    </div>

@endsection

