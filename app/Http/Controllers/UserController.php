<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\TesteUnidev;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {

        // cria um novo registro no banco de dados
        // $user = new User();
        // $user->name = "Lucas Queiroz";
        // $user->email = "lucasqueroz@hotmail.com";
        // $user->password = "696969";
        // $user->save();

        // carrega o nome do usuario e altera a senha do usuario
        // $user = User::find(2);
        // echo $user->name;
        // $user->password = "taemshock";
        // $user->save();

        // dd(variavel) é igual a vardump()
        // dd($user);

        // apaga um dado do banco de dados usuario
        // $user = User::find(8);
        // $user->delete();

        // Carrega todos os registros (se o soft deletes estiver ativo, lista apenas os que não tem valor no delete_at)
        // $users = User::all();

        // Carrega todos os usuarios com a senha 123456
        // $users = User::where('password', '123456')->get();
        // Carrega todos os usuarios com a senha diferente de 123456
        // $users = User::where('password', '!=', '123456')->get();
        // Verificar se o e-mail é verificado
        //$users = User::where('password', '696969')->whereNotNull('email_verified_at')->get();

        //return view('users', compact('users'));

        //aula de sexta que assisti online
        // exemplo "inutil" de acordo com paulo, serve como um disparador de e-mail pode ser util no nucleo unidev
        // $user = User::find(4);

        // Mail::to($user)->send(new TesteUnidev($user));

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
            $data['password'] = bcrypt($data['password']);
            $user = new User();
            $user->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso');

        }catch(\Exception $e){
            $request->session()->flash('erro', 'Ocorreu um erro ao gravar dados');
        }

        return redirect()->back();
    }


}
