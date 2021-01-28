<form>
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="name" class="form-control" name="name" id="name" placeholder="Nome do Usuário Ex: João" value = "{{$user->name ?? ''}}" required>
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email"
      value = "{{$user->email ?? ''}}" required>
    </div>
    <form id="form-senha" role="form">
      <label for="Senha">Senha</label>
      <input type="password" class="form-control" id="password" minlength="6" name="password" placeholder="Senha" required>
      <label for="Confirmação de senha">Confirme sua senha</label>
      <input type="password" class="form-control" placeholder="Confirme Senha" id="confirm_password"  required>
      <div class="row mt-5">
        <button type="submit" class="btn btn-primary">Confirmar</button>
        </div>
    </form>
  </form>

