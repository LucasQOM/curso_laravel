<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $provider = new Provider();

        if($request->has('action') && $request->get('action') === 'search'){
            $providers = $provider->filterAll($request);
        } else {
            $providers = $provider->orderBy('name', 'asc')->paginate(15);
        }

        return view('providers.index', compact ('providers'));
    }

    public function create()
    {
        $provider = Provider::all();

        return view('providers.create');
    }

    public function store(ProviderRequest $request)
    {
        try{
            $data = $request->all();
            $providers = new Provider();
            $providers->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso');

        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao gravar dados');
        }

        return redirect()->back();
    }

    public function edit(Provider $provider, Request $request)
    {
        $providers = Provider::all();
        return view('providers.edit', compact('provider'));
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        try{
        $data =  $request->all();
        $provider->update($data);
        $request->session()->flash('success', 'Dados atualizados com sucesso');
        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao atualizar dados');
        }
        return redirect()->back();
    }

    public function destroy(Request $request, Provider $provider)
    {
        try{
        $provider->delete();
        $request->session()->flash('success', 'Dados Deletados com sucesso');
        }catch (\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao deletar os dados');
        }
        return redirect()->back();
    }

}
