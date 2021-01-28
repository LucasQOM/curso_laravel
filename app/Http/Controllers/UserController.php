<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\TesteUnidev;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $user = new User();
        if($request->has('action') && $request->get('action') === 'search'){
            $users = $user->filterAll($request);
        } else {
            $users = $user->orderBy('name', 'asc')->paginate(15);
        }
        return view('users.index', compact ('users'));

    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        try{
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user = new User();
            $user->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso');

        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao gravar dados' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function edit(User $user, Request $request)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        try{
        $data =  $request->all();
        if(empty($request->get('password'))){
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        $request->session()->flash('success', 'Dados atualizados com sucesso');
        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao atualizar dados' . $e->getMessage());
        }
        return redirect()->back();
    }

    public function destroy(Request $request, User $user)
    {
        try{
        $user->delete();
        $request->session()->flash('success', 'Dados Deletados com sucesso');
        }catch (\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao deletar os dados' . $e->getMessage());
        }
        return redirect()->back();
    }

}
