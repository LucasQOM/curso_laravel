<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ URL::to('')}}">
    <title>Unidev Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-primary bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Unidev</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav me-auto">
                <a class="nav-link {{(request()->segment(1) === 'product') ? 'active' : '' }}" href="{{ route('product.index') }}">Produtos</a>
                <a class="nav-link {{(request()->segment(1) === 'user') ? 'active' : '' }}" href="{{route('user.index')}}">Usuarios</a>
                <a class="nav-link {{(request()->segment(1) === 'provider') ? 'active' : '' }}" href="{{route('provider.index')}}">Fabricantes</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="nav-link" type="button"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                        Sair
                    </a>
                </form>
            </div>
            <span class="nav-text text-light" >
                Bem-vindo: {{  auth()->user()->name }}
            </span>
          </div>
        </div>
      </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md">

                @yield('main')

            </div>
        </div>
    </div>

    <form id="delete_form" action="" method="post">
            @csrf
            @method('delete')
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>

        const order_by = document.querySelector('#order_by');

        if(order_by){
        order_by.value = "{{request()->get('order_by')}}";
        }
        const provider = document.querySelector('#provider_id');
        if(provider){
        provider.value = "{{$product->provider_id ?? ''}}";
        }
        function deleteInDatabase(path) {
            if(confirm('Você tem certeza que seja remover este registro?'))
            {
            const deleteForm = document.querySelector('#delete_form');
            deleteForm.action = path;
            deleteForm.submit();
            }
        }
        var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value){
                confirm_password.setCustomValidity("Senhas não coincidem!");
            }else{
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>


</body>
</html>
