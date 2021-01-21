<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="name" class="form-control" id="name" placeholder="Nome do Usuário Ex: João" value = "{{$user->name ?? ''}}" required>
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"
      value = "{{$user->email ?? ''}}" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Senha" value = "{{$user->password ?? ''}}" required>
    </div>
    <div class="row mt-5">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

