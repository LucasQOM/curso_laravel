@if(session()->has('success'))
<div class="alert alert-success mt-5">
    <strong>Aviso!</strong><br>
    {{session()->get('success')}}
</div>
@endif
@if(session()->has('erro'))
<div class="alert alert-danger mt-5">
    <strong>Aviso!</strong><br>
    {{session()->get('error')}}
</div>
@endif
@if(session()->has('errors'))
<div class="alert alert-danger mt-5">
    <strong>Aviso!</strong><br>
    Alguns dados informados aparentam ter problemas: <br>
    <ul class="mt-2 mb-0">
        @foreach(session()->get('erros')->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
