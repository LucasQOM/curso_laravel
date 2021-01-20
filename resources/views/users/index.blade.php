@extends('layout.template')
@section('main')
    <h1>Lista de Usuários</h1>

    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
            <tr>
                <td scope="col">{{$user->id}}</th>
                <td scope="col">{{$user->name}}</th>
                <td scope="col">{{$user->email}}</th>
                <td scope="col"></th>
            </tr>
            @endforeach
          </tbody>
      </table>

    <div class="mt-5">
        {{$users->links()}}
    </div>

@endsection
