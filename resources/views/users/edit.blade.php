@extends('layout.template')
@section('main')

<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Atualização de Usuários</h1>
        <a href="{{route('user.index')}}" class="btn btn-primary">Voltar para a listagem</a>
    </div>
</div>

@include('layout.messages')

<form action="{{route('user.update', $user->id)}}" method="post">

    @csrf
    @method('put')
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="name" class="form-control" name="name" id="name" placeholder="Nome do Usuário Ex: João" value = "{{$user->name ?? ''}}" required>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email"
          value = "{{$user->email ?? ''}}" required>
        </div>
        <form id="form-senha" role="form">
          <label>NÃO OBRIGATÓRIO</label>
          <label for="Senha">Senha</label>
          <input type="password" class="form-control" id="password" minlength="6" name="password" placeholder="Senha">
          <label for="Confirmação de senha">Confirme sua senha</label>
          <input type="password" class="form-control" placeholder="Confirme Senha" id="confirm_password">
          <div class="row mt-5">
            <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
      </form>


</form>

@endsection
