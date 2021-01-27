@extends('layout.template')
@section('main')
@include('layout.messages')
    @include('products.partials.search')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Listagem de produtos</h1>
            <a href="{{route('product.create')}}" class="btn btn-success">Cadastrar novo</a>
        </div>
    </div>
<div class="table-responsive">
    <table class="table table-dark table-striped mt-5">
        <thead>
            <tr>
              <th>ID</th>
              <th>Nome do Produto</th>
              <th>Preço</th>
              <th>Fabricante</th>
              <th>Validade</th>
              <th>Fabricação</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</th>
                <td>{{$product->name}}</th>
                <td>{{$product->price_formated}}</th>
                <td>{{$product->provider->name ?? '---'}}</th>
                <td>{{$product->expiration_date->format('d/m/Y')}}</th>
                <td>{{$product->manufacturing_date->format('d/m/Y')}}</th>
                <td>
                <a class="btn btn-primary btn-sm" style="margin-right: 15px" href="{{route('product.edit', $product->id)}}">Editar</div>
                <a class="btn btn-danger btn-sm" onclick="deleteInDatabase('{{ route('product.destroy', $product->id) }}')">Excluir</div>
                </th>
            </tr>
            @endforeach
          </tbody>
      </table>
</div>
      <div class="mt-5">
          {{$products->appends([
            'action' => request('action'),
            'keyword' => request('keyword'),
            'price_from' => request('price_from'),
            'price_to' => request('price_to'),
            'order_by' => request('order_by')
              ])->links()}}
      </div>
@endsection
