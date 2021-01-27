@extends('layout.template')
@section('main')
@include('layout.messages')
@include('providers.partials.search')

<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Listagem de Fornecedores</h1>
        <a href="{{route('provider.create')}}" class="btn btn-success">Cadastrar novo</a>
    </div>
    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Telefone</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($providers as $provider)
            <tr>
                <td scope="col">{{$provider->id}}</th>
                <td scope="col">{{$provider->name}}</th>
                <td scope="col">{{$provider->email}}</th>
                <td scope="col">{{$provider->phone}}</th>
                <td scope="col"></th>
                <a class="btn btn-primary btn-sm" style="margin-right: 15px" href="{{route('provider.edit', $provider->id)}}">Editar</div>
                <a class="btn btn-danger btn-sm" onclick="deleteInDatabase('{{ route('provider.destroy', $provider->id) }}')">Excluir</div>
            </tr>
            @endforeach
          </tbody>
      </table>

    <div class="mt-5">
        {{$providers->appends([
            'action' => request('action'),
            'keyword' => request('keyword'),
            'email' => request('email')
            ])->links()}}
</div>

@endsection
