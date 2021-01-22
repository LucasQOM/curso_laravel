<div class="row">
    <div class="col-md mb-5">

        <h3 class="mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Filtros de busca</h3>

        <div class="collapse show" id="collapseExample">
            <div class="card card-body">

                <form class="row">

                    <input type="hidden" name="action" value="search">

                <form class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nome do Usuário" value="{{request()->get('keyword')}}">
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{request()->get('email')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        <a class="btn btn-warning" href="{{route('user.index')}}">Limpar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
