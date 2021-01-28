@extends('layout.template')
@section('main')

<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Cadastro de Fornecedores</h1>
        <a href="{{route('provider.index')}}" class="btn btn-primary">Voltar para a listagem</a>
    </div>
</div>

@include('layout.messages')

<form action="{{route('provider.store')}}" method="post">

    @csrf
    @include('providers.partials.form')
</form>

@endsection
