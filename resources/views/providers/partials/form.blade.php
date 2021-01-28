<form>
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nome do Usuário Ex: João" value = "{{$provider->name ?? ''}}" required>
      </div>
    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email" value = "{{$provider->email ?? ''}}" required>
    </div>
    <div class="form-group">
        <label for="phone">Telefone</label>
        <input type="tel" class="form-control" name="phone" id="phone" aria-describedby="phone" placeholder="Telefone" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}"
        value = "{{$provider->phone ?? ''}}" required>
        <small> formato: XX XXXXX-XXXX </small>
      </div>
    <div class="col-md-3">
        <select class="form-select" id="active" name="active">
            <option {{(isset($provider) && $provider->active) ? 'selected' : ''}} value="1"> Ativo</option>
            <option {{(isset($provider) && $provider->active !=1) ? 'selected' : ''}} value="0">Desativo</option>
        </select>
    </div>
    <div class="row mt-5">
    <button type="submit" class="btn btn-primary">Confirmar</button>
  </form>

