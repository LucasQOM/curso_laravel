<div class="row">
    <div class="col-md mb-5">

        <h3 class="mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Filtros de busca</h3>

        <div class="collapse show" id="collapseExample">
            <div class="card card-body">

                <form class="row">

                    <input type="hidden" name="action" value="search">

                <form class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nome do Fabricante" value="{{request()->get('keyword')}}">
                    </div>
                    <div class="col-md-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{request()->get('email')}}">
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone" value="{{request()->get('phone')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="order_by" name="order_by">
                            <option value="">Ordernar por...</option>
                            <option value="name">Nome</option>
                            <option value="email">E-mail</option>
                            <option value="phone">Telefone</option>
                        </select>
                    </div>
                    {{-- <div class="col-md">
                        <button type="submit" class="btn btn-dark">Filtrar</button>
                        <a class="btn btn-danger" href="{{route('provider.index')}}">Limpar</a>
                    </div> --}}
                    <div class="col-md-12 mt-2 text-center">
                        <button type="submit" class="btn btn-dark">Filtrar</button>
                        <a class="btn btn-danger" href="{{route('provider.index')}}">Limpar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
