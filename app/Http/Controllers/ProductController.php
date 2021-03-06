<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = new Product();

        if($request->has('action') && $request->get('action') === 'search'){
            $products = $product->filterAll($request);
        } else {
            $products = $product->orderBy('name', 'asc')->paginate(15);
        }

        return view('products.index', compact ('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();

        return view('products.create', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try{
            $data = $request->all();
            $product = new Product();
            $product->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso');

        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao gravar dados' . $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {
        $providers = Provider::all();
        return view('products.edit', compact('product', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try{
        $data =  $request->all();
        $product->update($data);
        $request->session()->flash('success', 'Dados atualizados com sucesso');
        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao atualizar dados' . $e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        try{
        $product->delete();
        $request->session()->flash('success', 'Dados Deletados com sucesso');
        }catch (\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao deletar os dados' . $e->getMessage());
        }
        return redirect()->back();
    }
}
